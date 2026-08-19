<?php
namespace App\Http\Controllers;

use App\Models\Category;
use App\Traits\ImageUpload;
use Illuminate\Http\Request;
use Vinkla\Hashids\Facades\Hashids;

class CategoryController extends Controller
{
    use ImageUpload;

    public function index()
    {
        $categories = Category::paginate(10);

        return view('admin.admin-category', compact('categories'));
    }

    public function create()
    {
        return view('admin.admin-create-category');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'CT_Name' => 'required|string|max:255',
            'CT_Img'  => 'required|image|max:2048',
        ]);

        if ($request->hasFile('CT_Img')) {
            $validated['CT_Img'] = $this->ImageUpload($request->file('CT_Img'), 'categories', 'category_1');
        }

        Category::create($validated);

        return redirect()->route('admin-category')->with('success', 'Category created successfully.');
    }

    public function edit($id)
    {
        $realId = Hashids::decode($id)[0] ?? $id;
        $category = Category::findOrFail($realId);

        return view('admin.admin-edit-category', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $realId = Hashids::decode($id)[0] ?? $id;
        $category = Category::findOrFail($realId);

        $validated = $request->validate([
            'CT_Name' => 'required|string|max:255',
            'CT_Img'  => 'required|image|max:2048',
        ]);

        if ($request->hasFile('CT_Img')) {
            if ($category->CT_Img && file_exists(public_path('/storage/uploads/categories/' . $category->CT_Img))) {
                unlink(public_path('/storage/uploads/categories/' . $category->CT_Img));
            }
            $validated['CT_Img'] = $this->ImageUpload($request->file('CT_Img'), 'categories', 'category_1');
        }

        $category->update($validated);

        return redirect()->route('admin-category')->with('success', 'Category updated successfully.');
    }

    public function destroy($id)
    {
        $realId = Hashids::decode($id)[0] ?? $id;
        $category = Category::findOrFail($realId);

        if ($category->CT_Img && file_exists(public_path('/storage/uploads/categories/' . $category->CT_Img))) {
            unlink(public_path('/storage/uploads/categories/' . $category->CT_Img));
        }

        $category->delete();

        return redirect()->route('admin-category')->with('success', 'Category deleted successfully.');
    }
}
