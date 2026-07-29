<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{

    // username-password
    public function login(Request $request)
    {
        $request->validate([
            'email'    => 'required|string',
            'password' => 'required|string',
        ]);

        $loginField = $request->input('email');
        $fieldType  = filter_var($loginField, FILTER_VALIDATE_EMAIL) ? 'VR_Email_1' : 'VR_Name';

        if (Auth::guard('vendor')->attempt([$fieldType => $loginField, 'password' => $request->password])) {
            $request->session()->regenerate();
            return redirect()->route('vendor.dashboard');
        }

        throw ValidationException::withMessages([
            'email' => 'Invalid email/username or password.',
        ]);
    }

}
