<?php
namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Vendor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class VendorController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'VR_Name'     => 'required|string|max:255',
            'VR_Phone'    => 'required|string|max:20',
            'VR_Type'     => 'required|in:private-company,self-employed',
            'VR_Email_1'  => 'required|email|unique:users,email|unique:vendors,VR_Email_1',
            'VR_Email_2'  => 'nullable|email',
            'VR_Password' => 'required|string|min:8',
        ]);

        DB::beginTransaction();

        try {

            $user = User::create([
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
                'VR_Password' => Hash::make($validated['VR_Password']),
                'VR_Type'     => $validated['VR_Type'],
                'VR_Status'   => 0,
            ]);

            DB::commit();

            return back()->with('success', 'Vendor account created successfully.');

        } catch (\Exception $e) {

            DB::rollBack();

            return back()->with('error', $e->getMessage());
        }
    }
}
