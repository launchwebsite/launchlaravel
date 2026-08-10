<?php
namespace App\Http\Controllers;

use App\Models\Attributes;
use App\Models\Category;
use App\Models\Product;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $attributes     = Attributes::all();
        $categories     = Category::all();
        $sub_categories = SubCategory::all();

        return view(
            'admin.product',
            compact(
                'attributes',
                'categories',
                'sub_categories'
            )
        );
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'CT_Id'     => 'required|exists:categories,CT_Id',
                'SC_Id'     => 'required|exists:sub_categories,SC_Id',
                'AT_Inputs' => 'required|array',
            ],
            [
                'CT_Id.required'     => 'Please select a Category.',
                'SC_Id.required'     => 'Please select a Subcategory.',
                'AT_Inputs.required' => 'Please fill in the product details.',
            ]
        );

        $details = [];

        foreach ($request->AT_Inputs as $attributeId => $value) {

            $attribute = Attributes::find($attributeId);

            if (! $attribute) {
                continue;
            }

            /*
        |--------------------------------------------------------------------------
        | FILE / IMAGE UPLOAD
        |--------------------------------------------------------------------------
        */
            if ($value instanceof \Illuminate\Http\UploadedFile) {

                if ($value->isValid()) {

                    $filename = time() . '_' . uniqid() . '_' . $value->getClientOriginalName();

                    $value->move(
                        public_path('storage/uploads/products'),
                        $filename
                    );

                    $value = $filename;
                }
            }

            /*
        |--------------------------------------------------------------------------
        | CHECKBOX / ARRAY VALUES
        |--------------------------------------------------------------------------
        */
            elseif (is_array($value)) {

                $arrayValues = [];

                foreach ($value as $item) {

                    if ($item instanceof \Illuminate\Http\UploadedFile) {

                        if ($item->isValid()) {

                            $filename = time() . '_' . uniqid() . '_' . $item->getClientOriginalName();

                            $item->move(
                                public_path('storage/uploads/products'),
                                $filename
                            );

                            $arrayValues[] = $filename;
                        }

                    } else {
                        $arrayValues[] = $item;
                    }
                }

                // If it's a normal checkbox array, store as comma-separated string
                $value = implode(',', $arrayValues);
            }

            /*
        |--------------------------------------------------------------------------
        | STORE ATTRIBUTE VALUE
        |--------------------------------------------------------------------------
        */

            $details[$attribute->AT_Inputs] = $value;
        }

        /*
    |--------------------------------------------------------------------------
    | CREATE PRODUCT
    |--------------------------------------------------------------------------
    */

        Product::create([
            'CT_Id'      => $request->CT_Id,
            'SC_Id'      => $request->SC_Id,
            'VR_Id'      => auth()->guard('vendor')->id(),
            'Role_Id'    => 1,
            'PR_Details' => $details,
        ]);

        return redirect()
            ->back()
            ->with('success', 'Product created successfully.');
    }

    public function adminList()
    {
        $products = Product::with([
            'vendor',
            'category',
        ])
            ->latest()
            ->paginate(15);

        return view(
            'admin.admin-product-list',
            compact('products')
        );
    }

    public function getAttributes($id)
    {
        $attributes = Attributes::where('SC_Id', $id)->get();

        return response()->json($attributes);
    }

    public function getSubCategories($id)
    {
        $subCategories = SubCategory::where('CT_Id', $id)->get();

        return response()->json($subCategories);
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);

        $categories = Category::orderBy('CT_Name')->get();

        $sub_categories = SubCategory::orderBy('SC_Name')->get();

        $attributes = Attributes::all();

        return view(
            'admin.admin-product-edit',
            compact(
                'product',
                'categories',
                'sub_categories',
                'attributes'
            )
        );
    }

    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $request->validate(
            [
                'CT_Id'     => 'required|exists:categories,CT_Id',
                'SC_Id'     => 'required|exists:sub_categories,SC_Id',
                'AT_Inputs' => 'required|array',
            ],
            [
                'CT_Id.required'     => 'Please select a Category.',
                'SC_Id.required'     => 'Please select a Subcategory.',
                'AT_Inputs.required' => 'Please fill in the product details.',
            ]
        );

        // Make sure selected subcategory belongs
        // to selected category
        $subcategory = SubCategory::where('SC_Id', $request->SC_Id)
            ->where('CT_Id', $request->CT_Id)
            ->first();

        if (! $subcategory) {
            return back()
                ->withErrors([
                    'SC_Id' => 'The selected subcategory does not belong to the selected category.',
                ])
                ->withInput();
        }

        $details = [];

        if ($request->has('AT_Inputs')) {

            foreach ($request->AT_Inputs as $attributeId => $value) {

                // Only get attributes belonging to
                // the selected subcategory
                $attribute = Attributes::where('AT_Id', $attributeId)
                    ->where('CT_Id', $request->CT_Id)
                    ->where('SC_Id', $request->SC_Id)
                    ->first();

                if ($attribute) {

                    // Checkbox values come as arrays
                    if (is_array($value)) {
                        $value = implode(',', $value);
                    }

                    $details[$attribute->AT_Inputs] = $value;
                }
            }
        }

        $product->update([
            'CT_Id'      => $request->CT_Id,
            'SC_Id'      => $request->SC_Id,
            'PR_Details' => $details,
        ]);

        return redirect()
            ->route('admin.product.list')
            ->with('success', 'Product updated successfully.');
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        $product->delete();

        return redirect()
            ->route('admin.product.list')
            ->with('success', 'Product deleted successfully.');
    }
}
