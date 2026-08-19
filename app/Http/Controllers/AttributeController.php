<?php
namespace App\Http\Controllers;

use App\Models\Attributes;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Vinkla\Hashids\Facades\Hashids;

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
        $request->merge([
            'CT_Id' => Hashids::decode($request->CT_Id)[0] ?? $request->CT_Id,
            'SC_Id' => Hashids::decode($request->SC_Id)[0] ?? $request->SC_Id,
        ]);

        $validator = Validator::make($request->all(), [
            'CT_Id'        => 'required|exists:categories,CT_Id',
            'SC_Id'        => 'required|exists:sub_categories,SC_Id',
            'AT_Inputs'    => 'required|string|min:3',
            'AT_Structure' => 'nullable|string|min:3',
             'AT_Options' => 'nullable|string|min:3',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $data = $request->only([
            'CT_Id',
            'SC_Id',
            'AT_Inputs',
            'AT_Structure',
            'AT_Options',

        ]);

        Attributes::create($data);

        return redirect()
            ->route('attributes.index')
            ->with('success', 'Attributes  added successfully.');
    }

    public function edit($id)
    {
        $realId = Hashids::decode($id)[0] ?? $id;
        $attributes     = Attributes::findOrFail($realId);
        $categories     = Category::all();
        $sub_categories = SubCategory::all();

        return view('admin.add-attributes', compact('attributes', 'categories', 'sub_categories'));
    }

    public function update(Request $request, $id)
    {
        $request->merge([
            'CT_Id' => Hashids::decode($request->CT_Id)[0] ?? $request->CT_Id,
            'SC_Id' => Hashids::decode($request->SC_Id)[0] ?? $request->SC_Id,
        ]);

        $validator = Validator::make($request->all(), [
            'CT_Id'        => 'required|exists:categories,CT_Id',
            'SC_Id'        => 'required|exists:sub_categories,SC_Id',
            'AT_Inputs'    => 'required|string|min:3',
            'AT_Structure' => 'nullable|string|min:3',
              'AT_Options' => 'nullable|string|min:3',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $realId     = Hashids::decode($id)[0] ?? $id;
        $attributes = Attributes::findOrFail($realId);

        $data = $request->only([
            'CT_Id',
            'SC_Id',
            'AT_Inputs',
            'AT_Structure',
            'AT_Options',

        ]);

        $attributes->update($data);

        return redirect()
            ->route('attributes.index')
            ->with('success', 'Attributes updated successfully.');
    }

    public function destroy($id)
    {
        $realId = Hashids::decode($id)[0] ?? $id;
        $attributes = Attributes::findOrFail($realId);

        $attributes->delete();

        return redirect()->route('attributes.index')->with('success', 'Attributes deleted successfully.');
    }
}
