<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\SubCategory;
use App\Traits\ImageUpload;
use Illuminate\Http\Request;
use Vinkla\Hashids\Facades\Hashids;

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
        $request->merge(['CT_Id' => Hashids::decode($request->CT_Id)[0] ?? $request->CT_Id]);

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

    public function edit($id)
    {
        $realId = Hashids::decode($id)[0] ?? $id;
        $subCategory = SubCategory::findOrFail($realId);
        $categories = Category::orderBy('CT_Name')->get();

        return view('admin.admin-subcategory-edit', compact('subCategory', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $realId = Hashids::decode($id)[0] ?? $id;
        $request->merge(['CT_Id' => Hashids::decode($request->CT_Id)[0] ?? $request->CT_Id]);

        $request->validate([
            'CT_Id'   => 'required|exists:categories,CT_Id',
            'SC_Name' => 'required|string|max:255',
            'SC_Img'  => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $subCategory = SubCategory::findOrFail($realId);
        $data = $request->only(['CT_Id', 'SC_Name']);

        if ($request->hasFile('SC_Img')) {
            $data['SC_Img'] = $this->ImageUpload($request->file('SC_Img'), 'subcategories', 'sub_category_');
        }

        $subCategory->update($data);

        return redirect()->route('admin-subcategory')->with('success', 'Subcategory updated successfully.');
    }

    public function destroy($id)
    {
        $realId = Hashids::decode($id)[0] ?? $id;
        $subCategory = SubCategory::findOrFail($realId);

        $subCategory->delete();

        return redirect()->route('admin-subcategory')->with('success', 'Subcategory deleted successfully.');
    }
}
