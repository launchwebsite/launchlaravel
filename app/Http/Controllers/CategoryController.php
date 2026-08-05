<?php
namespace App\Http\Controllers;

use App\Models\Category;
use App\Traits\ImageUpload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

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

    public function edit(Request $request)
    {
        $request->validate(['id' => 'required|integer']);

        session(['editing_category_id' => $request->id]);

        return redirect()->route('admin-category-edit-show');
    }

    public function showEdit()
    {
        $id = session('editing_category_id');

        if (!$id) {
            return redirect()->route('admin-category');
        }

        $category = Category::findOrFail($id);

        return view('admin.admin-edit-category', compact('category'));
    }

    public function update(Request $request)
    {
        $id = session('editing_category_id');
        $category = Category::findOrFail($id);

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
        session()->forget('editing_category_id');

        return redirect()->route('admin-category')->with('success', 'Category updated successfully.');
    }

    public function destroy($id)
    {
        $category = Category::findOrFail(Crypt::decryptString($id));

        if ($category->CT_Img && file_exists(public_path('/storage/uploads/categories/' . $category->CT_Img))) {
            unlink(public_path('/storage/uploads/categories/' . $category->CT_Img));
        }

        $category->delete();

        return redirect()->route('admin-category')->with('success', 'Category deleted successfully.');
    }
}
