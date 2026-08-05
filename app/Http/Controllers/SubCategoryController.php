<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\SubCategory;
use App\Traits\ImageUpload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class SubCategoryController extends Controller
{
    use ImageUpload;

    public function index()
    {
        $subCategories = SubCategory::with('category')->latest('SC_Id')->paginate(10);

        return view('admin.admin-subcategory', compact('subCategories'));
    }

    public function create()
    {
        $categories = Category::orderBy('CT_Name')->get();

        return view('admin.admin-subcategory-create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'CT_Id'   => 'required|exists:categories,CT_Id',
            'SC_Name' => 'required|string|max:255',
            'SC_Img'  => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $data = $request->only(['CT_Id', 'SC_Name']);

        if ($request->hasFile('SC_Img')) {
            $data['SC_Img'] = $this->ImageUpload($request->file('SC_Img'), 'subcategories', 'sub_category_');
        }

        SubCategory::create($data);

        return redirect()->route('admin-subcategory')->with('success', 'Subcategory created successfully.');
    }

    public function edit(Request $request)
    {
        $subCategory = SubCategory::findOrFail($request->id);
        $categories = Category::orderBy('CT_Name')->get();

        return view('admin.admin-subcategory-edit', compact('subCategory', 'categories'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'SC_Id'   => 'required|exists:sub_categories,SC_Id',
            'CT_Id'   => 'required|exists:categories,CT_Id',
            'SC_Name' => 'required|string|max:255',
            'SC_Img'  => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $subCategory = SubCategory::findOrFail($request->SC_Id);
        $data = $request->only(['CT_Id', 'SC_Name']);

        if ($request->hasFile('SC_Img')) {
            $data['SC_Img'] = $this->ImageUpload($request->file('SC_Img'), 'subcategories', 'sub_category_');
        }

        $subCategory->update($data);

        return redirect()->route('admin-subcategory')->with('success', 'Subcategory updated successfully.');
    }

    public function destroy($id)
    {
        $subCategory = SubCategory::findOrFail(Crypt::decryptString($id));

        $subCategory->delete();

        return redirect()->route('admin-subcategory')->with('success', 'Subcategory deleted successfully.');
    }
}
