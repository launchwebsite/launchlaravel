<?php
namespace App\Http\Controllers;

use App\Models\Career;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class CareerController extends Controller
{
    public function index()
    {
        $careers        = Career::all();
        $categories     = Category::where('CT_Name', 'Jobs')->get();
        $sub_categories = SubCategory::all();
        return view('admin.careers-list', compact('careers', 'categories', 'sub_categories'));

    }

    public function create()
    {
        $category = Category::where('CT_Name', 'Jobs')->first();

        $categories = Category::where('CT_Name', 'Jobs')->get();

        $sub_categories = SubCategory::where('CT_Id', $category->CT_Id)->get();

        return view('admin.add-career', compact('categories', 'sub_categories'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'CT_Id'          => 'required|exists:categories,CT_Id',
            'SC_Name'        => 'required|string|max:255',
            'CR_Name'        => 'required|string|min:3',
            'CR_Location'    => 'nullable|string',
            'CR_SalaryRange' => 'nullable|string',
            'CR_Type'        => 'nullable|string',
            'CR_Company'     => 'nullable|string',
            'CR_Img'         => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        // Check if Sub Category already exists
        $subCategory = SubCategory::where('CT_Id', $request->CT_Id)
            ->where('SC_Name', trim($request->SC_Name))
            ->first();

        // Create new if not exists
        if (! $subCategory) {
            $subCategory = SubCategory::create([
                'CT_Id'   => $request->CT_Id,
                'SC_Name' => trim($request->SC_Name),
            ]);
        }

        $data = [
            'CT_Id'          => $request->CT_Id,
            'SC_Id'          => $subCategory->SC_Id,
            'Role_Id'        => 1, // Admin
            'CR_Name'        => $request->CR_Name,
            'CR_Location'    => $request->CR_Location,
            'CR_SalaryRange' => $request->CR_SalaryRange,
            'CR_Type'        => $request->CR_Type,
            'CR_Company'     => $request->CR_Company,
        ];

        // Upload Image
        if ($request->hasFile('CR_Img')) {

            $image     = $request->file('CR_Img');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/career'), $imageName);

            $data['CR_Img'] = $imageName;
        }

        Career::create($data);

        return redirect()->route('career.index')
            ->with('success', 'Career added successfully.');
    }

    public function edit($id)
    {
        $category = Category::where('CT_Name', 'Jobs')->first();
        $careers  = Career::findOrFail($id);

        $categories     = Category::where('CT_Name', 'Jobs')->get();
        $sub_categories = SubCategory::where('CT_Id', $category->CT_Id)->get();

        return view('admin.add-career', compact(
            'careers',
            'categories',
            'sub_categories',
            'category',
        ));
    }

    public function update(Request $request, $id)
    {
        $career = Career::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'CT_Id'          => 'required|exists:categories,CT_Id',
            'SC_Name'        => 'required|string|max:255',
            'CR_Name'        => 'required|string|min:3',
            'CR_Location'    => 'nullable|string',
            'CR_SalaryRange' => 'nullable|string',
            'CR_Type'        => 'nullable|string',
            'CR_Company'     => 'nullable|string',
            'CR_Img'         => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $newName = trim($request->SC_Name);


        $existing = SubCategory::where('CT_Id', $request->CT_Id)
            ->where('SC_Name', $newName)
            ->first();

        if ($existing) {


            $SC_Id = $existing->SC_Id;

        } else {


            $subCategory = SubCategory::findOrFail($career->SC_Id);

            $subCategory->update([
                'SC_Name' => $newName,
            ]);

            $SC_Id = $subCategory->SC_Id;
        }

        $data = [
            'CT_Id'          => $request->CT_Id,
         'SC_Id'          => $SC_Id, // FIXED
            'Role_Id'        => 1, // Admin
            'CR_Name'        => $request->CR_Name,
            'CR_Location'    => $request->CR_Location,
            'CR_SalaryRange' => $request->CR_SalaryRange,
            'CR_Type'        => $request->CR_Type,
            'CR_Company'     => $request->CR_Company,
        ];


        if ($request->hasFile('CR_Img')) {

            if ($career->CR_Img && File::exists(public_path('uploads/career/' . $career->CR_Img))) {
                File::delete(public_path('uploads/career/' . $career->CR_Img));
            }

            $image     = $request->file('CR_Img');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/career'), $imageName);

            $data['CR_Img'] = $imageName;
        }

        $career->update($data);

        return redirect()->route('career.index')
            ->with('success', 'Career updated successfully.');
    }

    public function destroy($id)
    {
        $careers = Career::findOrFail($id);

        if ($careers->CR_Img && file_exists(public_path($careers->CR_Img))) {
            unlink(public_path($careers->CR_Img));
        }

        $careers->delete();

        return redirect()->route('career.index')->with('success', 'Career deleted successfully.');
    }
}
