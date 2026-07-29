<?php
namespace App\Http\Controllers;

use App\Mail\VendorOnHoldMail;
use App\Mail\VendorTerminatedMail;
use App\Mail\VendorUnverifiedMail;
use App\Mail\VendorVerifiedMail;
use App\Models\Category;
use App\Models\User;
use App\Models\Vendor;
use Illuminate\Support\Facades\Mail;

class AdminController extends Controller
{
    public function dashboard()
    {
        $totalVendors    = Vendor::count();
        $pendingVendors  = Vendor::where('VR_Status', 0)->count();
        $verifiedVendors = Vendor::where('VR_Status', 1)->count();
        $onHoldVendors   = Vendor::where('VR_Status', 2)->count();
        $totalCategories = Category::count();

        return view('admin.dashboard', compact(
            'totalVendors',
            'pendingVendors',
            'verifiedVendors',
            'onHoldVendors',
            'totalCategories'
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
}
