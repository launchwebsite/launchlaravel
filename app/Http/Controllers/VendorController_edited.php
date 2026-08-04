<?php
namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\User;
use App\Models\Vendor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class VendorController extends Controller
{

    public function create()
    {
        $categories = Category::orderBy('CT_Name')->get();

        return view('admin.vendor-create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'VR_Name'      => 'required|string|max:255',
            'VR_Phone'     => 'required|string|max:20',
            'CT_Id'        => 'required',
            'new_category' => 'required_if:CT_Id,new|string|max:255',
            'VR_Type'      => 'required|in:private-company,self-employed',
            'VR_Email_1'   => 'required|email|unique:vendors,VR_Email_1',
            'VR_Email_2'   => 'nullable|email',
            'VR_Password'  => 'required|string|min:8',
        ]);

        try {

            if ($validated['CT_Id'] == 'new') {

                $category = Category::where('CT_Name', $validated['new_category'])->first();

                if (! $category) {
                    $category = Category::create([
                        'CT_Name' => $validated['new_category'],
                    ]);
                }

                $categoryId = $category->CT_Id;

            } else {

                $category = Category::where('CT_Id', $validated['CT_Id'])->first();

                if (! $category) {
                    return back()->withErrors([
                        'CT_Id' => 'Selected category is invalid.',
                    ])->withInput();
                }

                $categoryId = $category->CT_Id;
            }

            Vendor::create([
                'VR_Name'     => $validated['VR_Name'],
                'VR_Email_1'  => $validated['VR_Email_1'],
                'VR_Email_2'  => $validated['VR_Email_2'] ?? null,
                'VR_Phone'    => $validated['VR_Phone'],
                'CT_Id'       => $categoryId,
                'VR_Password' => Hash::make($validated['VR_Password']),
                'VR_Type'     => $validated['VR_Type'],
                'VR_Status'   => 0,
            ]);

            return redirect()->route('user')->with('success', 'Vendor account created successfully. Please wait while we verify your details.');

        } catch (\Exception $e) {

            // return back()->withInput()->with('error', $e->getMessage());

            dd($e->getMessage());
        }
    }

    public function edit($id)
    {
        $vendor     = Vendor::findOrFail($id);
        $categories = Category::orderBy('CT_Name')->get();

        return view('admin.vendor-edit', compact('vendor', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $vendor = Vendor::findOrFail($id);

        $validated = $request->validate([
            'VR_Name'      => 'required|string|max:255',
            'VR_Phone'     => 'required|string|max:20',
            'CT_Id'        => 'required',
            'new_category' => 'nullable:CT_Id,new|string|max:255',
            'VR_Type'      => 'required|in:private-company,self-employed',
            'VR_Email_1'   => [
                'required',
                'email',
                Rule::unique('vendors', 'VR_Email_1')->ignore($vendor->VR_Id, 'VR_Id'),
                Rule::unique('users', 'email')->ignore($vendor->VR_Email_1, 'email'),
            ],
            'VR_Email_2'   => 'nullable|email',
            'VR_Password'  => 'nullable|string|min:8',
        ]);

        DB::beginTransaction();

        try {

            // Determine Category ID
            if ($validated['CT_Id'] == 'new') {

                $category = Category::where('CT_Name', $validated['new_category'])->first();

                if (! $category) {
                    $category = Category::create([
                        'CT_Name' => $validated['new_category'],
                    ]);
                }

                $categoryId = $category->CT_Id;

            } else {

                $category = Category::where('CT_Id', $validated['CT_Id'])->first();

                if (! $category) {
                    return back()->withErrors([
                        'CT_Id' => 'Selected category is invalid.',
                    ])->withInput();
                }

                $categoryId = $category->CT_Id;
            }

            $userData = [
                'name'  => $validated['VR_Name'],
                'email' => $validated['VR_Email_1'],
            ];

            $vendorData = [
                'VR_Name'    => $validated['VR_Name'],
                'VR_Email_1' => $validated['VR_Email_1'],
                'VR_Email_2' => $validated['VR_Email_2'] ?? null,
                'VR_Phone'   => $validated['VR_Phone'],
                'CT_Id'      => $categoryId,
                'VR_Type'    => $validated['VR_Type'],
            ];

            if (! empty($validated['VR_Password'])) {
                $userData['password']      = Hash::make($validated['VR_Password']);
                $vendorData['VR_Password'] = Hash::make($validated['VR_Password']);
            }

            // Keep the linked User row (matched by original email) in sync
            User::where('email', $vendor->VR_Email_1)->update($userData);

            $vendor->update($vendorData);

            DB::commit();

            return redirect()->route('admin.vendor')->with('success', 'Vendor updated successfully.');

        } catch (\Exception $e) {

            DB::rollBack();

            return back()->with('error', $e->getMessage());
        }
    }

    public function dashboard()
    {
        if (auth()->user()->VR_Status == 0) {
            session()->flash('approval_pending', true);
        }

        return view('vendor.index');
    }
}
