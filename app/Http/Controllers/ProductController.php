<?php
namespace App\Http\Controllers;

use App\Models\Attributes;
use App\Models\Category;
use App\Models\Product;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;

class ProductController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | ADD PRODUCT PAGE
    |--------------------------------------------------------------------------
    */

    public function index()
    {
        $categories = Category::orderBy('CT_Name')->get();

        $sub_categories = SubCategory::orderBy('SC_Name')->get();

        /*
        |--------------------------------------------------------------------------
        | Do NOT use $product here.
        |
        | This is the Add Product page, so there is no existing product yet.
        | Attributes will be filtered by subcategory using getAttributes().
        |--------------------------------------------------------------------------
        */

        $attributes = Attributes::orderBy('AT_Id')->get();

        return view(
            'admin.product',
            compact(
                'attributes',
                'categories',
                'sub_categories'
            )
        );
    }

    /*
    |--------------------------------------------------------------------------
    | STORE PRODUCT
    |--------------------------------------------------------------------------
    */

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

        /*
        |--------------------------------------------------------------------------
        | Check category/subcategory relationship
        |--------------------------------------------------------------------------
        */

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

        /*
        |--------------------------------------------------------------------------
        | Process Attributes
        |--------------------------------------------------------------------------
        */

        foreach ($request->AT_Inputs as $attributeId => $value) {

            /*
            |--------------------------------------------------------------------------
            | Only accept attributes belonging to selected category/subcategory
            |--------------------------------------------------------------------------
            */

            $attribute = Attributes::where('AT_Id', $attributeId)
                ->where('CT_Id', $request->CT_Id)
                ->where('SC_Id', $request->SC_Id)
                ->first();

            if (! $attribute) {
                continue;
            }

            /*
            |--------------------------------------------------------------------------
            | FILE / IMAGE UPLOAD
            |--------------------------------------------------------------------------
            */

            if ($value instanceof UploadedFile) {

                if ($value->isValid()) {

                    $filename = time()
                    . '_'
                    . uniqid()
                    . '_'
                    . $value->getClientOriginalName();

                    $value->move(
                        public_path('storage/uploads/products'),
                        $filename
                    );

                    $value = $filename;
                }
            }

            /*
            |--------------------------------------------------------------------------
            | ARRAY / CHECKBOX VALUES
            |--------------------------------------------------------------------------
            */

            elseif (is_array($value)) {

                $arrayValues = [];

                foreach ($value as $item) {

                    if ($item instanceof UploadedFile) {

                        if ($item->isValid()) {

                            $filename = time()
                            . '_'
                            . uniqid()
                            . '_'
                            . $item->getClientOriginalName();

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

    /*
    |--------------------------------------------------------------------------
    | ADMIN PRODUCT LIST
    |--------------------------------------------------------------------------
    */

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

    /*
    |--------------------------------------------------------------------------
    | GET ATTRIBUTES BY SUBCATEGORY
    |--------------------------------------------------------------------------
    */

    public function getAttributes($id)
    {
        $attributes = Attributes::where('SC_Id', $id)
            ->orderBy('AT_Id')
            ->get();

        return response()->json($attributes);
    }

    /*
    |--------------------------------------------------------------------------
    | GET SUBCATEGORIES BY CATEGORY
    |--------------------------------------------------------------------------
    */

    public function getSubCategories($id)
    {
        $subCategories = SubCategory::where('CT_Id', $id)
            ->orderBy('SC_Name')
            ->get();

        return response()->json($subCategories);
    }

    /*
    |--------------------------------------------------------------------------
    | EDIT PRODUCT
    |--------------------------------------------------------------------------
    */

    public function edit(Request $request)
    {
        // Validate the hidden product ID
        $request->validate([
            'PR_Id' => 'required|exists:products,PR_Id',
        ]);

        // Get the product using the hidden PR_Id
        $product = Product::findOrFail($request->PR_Id);

        /*
    |--------------------------------------------------------------------------
    | Load all categories
    |--------------------------------------------------------------------------
    */

        $categories = Category::orderBy('CT_Name')
            ->get();

        /*
    |--------------------------------------------------------------------------
    | ONLY load subcategories belonging to this product's category
    |--------------------------------------------------------------------------
    */

        $sub_categories = SubCategory::where(
            'CT_Id',
            $product->CT_Id
        )
            ->orderBy('SC_Name')
            ->get();

        /*
    |--------------------------------------------------------------------------
    | ONLY load attributes belonging to this product's subcategory
    |--------------------------------------------------------------------------
    |
    | Example:
    |
    | Product = Canon Camera
    | Subcategory = Cameras
    |
    | Loads:
    | Brand
    | Model
    | Camera Type
    | Resolution
    | Lens Mount
    |
    | Does NOT load:
    | RAM
    | Mileage
    | Bedrooms
    | Fuel Type
    | Sofa Type
    |
    */

        $attributes = Attributes::where(
            'SC_Id',
            $product->SC_Id
        )
            ->orderBy('AT_Id')
            ->get();

        /*
    |--------------------------------------------------------------------------
    | Return edit page
    |--------------------------------------------------------------------------
    */

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

    /*
    |--------------------------------------------------------------------------
    | UPDATE PRODUCT
    |--------------------------------------------------------------------------
    */

    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        /*
        |--------------------------------------------------------------------------
        | VALIDATION
        |--------------------------------------------------------------------------
        */

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

        /*
        |--------------------------------------------------------------------------
        | Check category/subcategory relationship
        |--------------------------------------------------------------------------
        */

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

        /*
        |--------------------------------------------------------------------------
        | Existing Details
        |--------------------------------------------------------------------------
        */

        $existingDetails = $product->PR_Details ?? [];

        if (is_string($existingDetails)) {
            $existingDetails = json_decode(
                $existingDetails,
                true
            ) ?? [];
        }

        $details = [];

        /*
        |--------------------------------------------------------------------------
        | Process Attributes
        |--------------------------------------------------------------------------
        */

        foreach ($request->AT_Inputs as $attributeId => $value) {

            /*
            |--------------------------------------------------------------------------
            | ONLY accept attributes belonging to selected
            | category + subcategory
            |--------------------------------------------------------------------------
            */

            $attribute = Attributes::where('AT_Id', $attributeId)
                ->where('CT_Id', $request->CT_Id)
                ->where('SC_Id', $request->SC_Id)
                ->first();

            if (! $attribute) {
                continue;
            }

            /*
            |--------------------------------------------------------------------------
            | FILE / IMAGE
            |--------------------------------------------------------------------------
            */

            if ($value instanceof UploadedFile) {

                if ($value->isValid()) {

                    $filename = time()
                    . '_'
                    . uniqid()
                    . '_'
                    . $value->getClientOriginalName();

                    $value->move(
                        public_path('storage/uploads/products'),
                        $filename
                    );

                    $value = $filename;

                } else {

                    /*
                    | Keep existing file if upload is invalid
                    */

                    $value = $existingDetails[$attribute->AT_Inputs] ?? '';
                }
            }

            /*
            |--------------------------------------------------------------------------
            | ARRAY / CHECKBOX
            |--------------------------------------------------------------------------
            */

            elseif (is_array($value)) {

                $arrayValues = [];

                foreach ($value as $item) {

                    if ($item instanceof UploadedFile) {

                        if ($item->isValid()) {

                            $filename = time()
                            . '_'
                            . uniqid()
                            . '_'
                            . $item->getClientOriginalName();

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
        | UPDATE PRODUCT
        |--------------------------------------------------------------------------
        */

        $product->update([
            'CT_Id'      => $request->CT_Id,
            'SC_Id'      => $request->SC_Id,
            'PR_Details' => $details,
        ]);

        return redirect()
            ->route('admin.product.list')
            ->with('success', 'Product updated successfully.');
    }

    /*
    |--------------------------------------------------------------------------
    | DELETE PRODUCT
    |--------------------------------------------------------------------------
    */

    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        $product->delete();

        return redirect()
            ->route('admin.product.list')
            ->with('success', 'Product deleted successfully.');
    }
}
