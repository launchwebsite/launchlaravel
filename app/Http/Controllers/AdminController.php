<?php
namespace App\Http\Controllers;

use App\Mail\VendorOnHoldMail;
use App\Mail\VendorTerminatedMail;
use App\Mail\VendorUnverifiedMail;
use App\Mail\VendorVerifiedMail;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\User;
use App\Models\Vendor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rule;

class AdminController extends Controller
{
    public function dashboard()
    {
        $totalVendors    = Vendor::count();
        $pendingVendors  = Vendor::where('VR_Status', 0)->count();
        $verifiedVendors = Vendor::where('VR_Status', 1)->count();
        $onHoldVendors   = Vendor::where('VR_Status', 2)->count();
        $totalCategories = Category::count();
        $totalSubCategories = SubCategory::count();

        return view('admin.dashboard', compact(
            'totalVendors',
            'pendingVendors',
            'verifiedVendors',
            'onHoldVendors',
            'totalCategories',
            'totalSubCategories'
        ));
    }

    public function vendor()
    {
        $vendors = Vendor::paginate(10);

        return view('admin.vendor-table', compact('vendors'));
    }

    public function toggleVendorStatus($id)
    {
        $vendor = Vendor::findOrFail($id);

        $vendor->VR_Status = match ($vendor->VR_Status) {
            0       => 1,
            1       => 2,
            2       => 1,
            default => 0,
        };

        $vendor->save();

        if ($vendor->VR_Status == 1) {
            Mail::to($vendor->VR_Email_1)->send(new VendorVerifiedMail($vendor));
        } elseif ($vendor->VR_Status == 2) {
            Mail::to($vendor->VR_Email_1)->send(new VendorOnHoldMail($vendor));
        } elseif ($vendor->VR_Status == 0) {
            Mail::to($vendor->VR_Email_1)->send(new VendorUnverifiedMail($vendor));
        }

        return redirect()->back()->with('success', 'Vendor status updated successfully.');
    }

    public function deleteVendor($id)
    {
        $vendor = Vendor::findOrFail($id);

        Mail::to($vendor->VR_Email_1)->send(new VendorTerminatedMail($vendor));

        User::where('email', $vendor->VR_Email_1)->delete();
        $vendor->delete();

        return redirect()->back()->with('success', 'Vendor deleted successfully.');
    }

    public function vendorCreate()
    {
        $categories = Category::orderBy('CT_Name')->get();

        return view('admin.vendor-create', compact('categories'));
    }

    public function vendorStore(Request $request)
    {
        $validated = $request->validate([
            'VR_Name'      => 'required|string|max:255',
            'VR_Phone'     => 'required|string|max:20',
            'CT_Id'        => 'required',
            'new_category' => 'nullable:CT_Id,new|string|max:255',
            'VR_Type'      => 'required|in:private-company,self-employed',
            'VR_Email_1'   => 'required|email|unique:users,email|unique:vendors,VR_Email_1',
            'VR_Email_2'   => 'nullable|email',
            'VR_Password'  => 'required|string|min:8',
        ]);

        DB::beginTransaction();

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

            User::create([
                'name'     => $validated['VR_Name'],
                'email'    => $validated['VR_Email_1'],
                'password' => Hash::make($validated['VR_Password']),
                'Role_Id'  => 2,
            ]);

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

            DB::commit();

            return redirect()->route('admin.vendor')->with('success', 'Vendor account created successfully.');

        } catch (\Exception $e) {

            DB::rollBack();

            return back()->with('error', $e->getMessage());
        }
    }

    public function vendorEdit($id)
    {
        $vendor = Vendor::findOrFail($id);
        $categories = Category::orderBy('CT_Name')->get();

        return view('admin.vendor-edit', compact('vendor', 'categories'));
    }

    public function vendorUpdate(Request $request, $id)
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
                $userData['password'] = Hash::make($validated['VR_Password']);
                $vendorData['VR_Password'] = Hash::make($validated['VR_Password']);
            }

            User::where('email', $vendor->VR_Email_1)->update($userData);

            $vendor->update($vendorData);

            DB::commit();

            return redirect()->route('admin.vendor')->with('success', 'Vendor updated successfully.');

        } catch (\Exception $e) {

            DB::rollBack();

            return back()->with('error', $e->getMessage());
        }
    }
}
