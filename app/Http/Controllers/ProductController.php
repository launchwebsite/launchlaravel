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

        if ($request->has('AT_Inputs')) {

            foreach ($request->AT_Inputs as $attributeId => $value) {

                $attribute = Attributes::find($attributeId);

                if ($attribute) {

                    // Checkbox values come as arrays
                    if (is_array($value)) {
                        $value = implode(',', $value);
                    }

                    $details[$attribute->AT_Inputs] = $value;
                }
            }
        }

        Product::create([
            'CT_Id'      => $request->CT_Id,
            'SC_Id'      => $request->SC_Id,
            'PR_Details' => $details,
        ]);

        return redirect()
            ->back()
            ->with('success', 'Product created successfully.');
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
}
