<?php
namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Vendor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class VendorController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'VR_Name'      => 'required|string|max:255',
            'VR_Phone'     => 'required|string|max:20',
            'VR_Type'      => 'required|in:private-company,self-employed',
            'CT_Id'        => 'required',
            'new_category' => 'required_if:CT_Id,new|string|max:255',
            'VR_Email_1'   => 'required|email|unique:vendors,VR_Email_1',
            'VR_Email_2'   => 'nullable|email',
            'VR_Password'  => 'required|string|min:8',
        ]);

        try {

            if ($validated['CT_Id'] === 'new') {
                $category = \App\Models\Category::create([
                    'CT_Name' => $validated['new_category'],
                ]);
                $categoryId = $category->CT_Id;
            } else {
                $categoryId = $validated['CT_Id'];
            }

            Vendor::create([
                'VR_Name'     => $validated['VR_Name'],
                'VR_Email_1'  => $validated['VR_Email_1'],
                'VR_Email_2'  => $validated['VR_Email_2'] ?? null,
                'VR_Phone'    => $validated['VR_Phone'],
                'VR_Password' => Hash::make($validated['VR_Password']),
                'VR_Type'     => $validated['VR_Type'],
                'CT_Id'       => $categoryId,
                'VR_Status'   => 0,
            ]);

            return redirect()->route('user')->with('success', 'Vendor account created successfully.');

        } catch (\Exception $e) {

            return back()->withInput()->with('error', 'Something went wrong. Please try again.');
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
