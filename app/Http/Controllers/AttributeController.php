<?php
namespace App\Http\Controllers;

use App\Models\Attributes;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AttributeController extends Controller
{
    public function index()
    {
        $attributes     = Attributes::all();
        $categories     = Category::all();
        $sub_categories = SubCategory::all();
        return view('admin.attributes-list', compact('attributes', 'categories', 'sub_categories'));

    }

    public function create()
    {

        $categories     = Category::all();
        $sub_categories = SubCategory::all();
        return view('admin.add-attributes', compact('categories', 'sub_categories'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'CT_Id'        => 'required|exists:categories,CT_Id',
            'SC_Id'        => 'required|exists:sub_categories,SC_Id',
            'AT_Inputs'    => 'required|string|min:3',
            'AT_Structure' => 'nullable|string|min:3',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $data = $request->only([
            'CT_Id',
            'SC_Id',
            'AT_Inputs',
            'AT_Structure',

        ]);

        Attributes::create($data);

        return redirect()
            ->route('attributes.index')
            ->with('success', 'Attributes  added successfully.');
    }

    public function edit(Request $request)
    {
        $request->validate(['id' => 'required|integer']);

        session(['editing_attribute_id' => $request->id]);

        return redirect()->route('attributes.edit-show');
    }

    public function showEdit()
    {
        $id = session('editing_attribute_id');

        if (! $id) {
            return redirect()->route('attributes.index');
        }

        $attributes     = Attributes::findOrFail($id);
        $categories     = Category::all();
        $sub_categories = SubCategory::all();

        return view('admin.add-attributes', compact('attributes', 'categories', 'sub_categories'));
    }

    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'CT_Id'        => 'required|exists:categories,CT_Id',
            'SC_Id'        => 'required|exists:sub_categories,SC_Id',
            'AT_Inputs'    => 'required|string|min:3',
            'AT_Structure' => 'nullable|string|min:3',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $id         = session('editing_attribute_id');
        $attributes = Attributes::findOrFail($id);

        $data = $request->only([
            'CT_Id',
            'SC_Id',
            'AT_Inputs',
            'AT_Structure',

        ]);

        $attributes->update($data);
        session()->forget('editing_attribute_id');

        return redirect()
            ->route('attributes.index')
            ->with('success', 'Attributes updated successfully.');
    }

    public function destroy($id)
    {
        $attributes = Attributes::findOrFail($id);

        $attributes->delete();

        return redirect()->route('attributes.index')->with('success', 'Attributes deleted successfully.');
    }
}
