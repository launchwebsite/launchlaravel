<?php
namespace App\Http\Controllers;

use App\Mail\VendorVerifiedMail;
use App\Models\Vendor;
use Illuminate\Support\Facades\Mail;

class AdminController extends Controller
{
    public function dashboard()
    {
        $totalVendors = Vendor::count();

        $pendingVendors = Vendor::where('VR_Status', 0)->count();

        $verifiedVendors = Vendor::where('VR_Status', 1)->count();

        return view('admin.dashboard', compact(
            'totalVendors',
            'pendingVendors',
            'verifiedVendors'
        ));
    }

    public function vendor()
    {
        $vendors = Vendor::paginate(10);

        return view('admin.vendor-table', compact('vendors'));
    }

    // public function toggleVendorStatus($id)
    // {
    //     $vendor = Vendor::findOrFail($id);

    //     // Toggle status
    //     $vendor->VR_Status = $vendor->VR_Status == 1 ? 0 : 1;
    //     $vendor->save();

    //     return redirect()->back()->with('success', 'Vendor status updated successfully.');
    // }

    public function toggleVendorStatus($id)
    {
        $vendor = Vendor::findOrFail($id);

        $vendor->VR_Status = $vendor->VR_Status == 1 ? 0 : 1;
        $vendor->save();

        if ($vendor->VR_Status == 1) {
            Mail::to($vendor->VR_Email_1)->send(new VendorVerifiedMail($vendor));
        }

        return redirect()->back()->with('success', 'Vendor status updated successfully.');
    }
}
