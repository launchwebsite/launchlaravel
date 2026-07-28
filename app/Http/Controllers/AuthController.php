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
        'email' => 'required|string',
        'password' => 'required|string',
    ]);

    $loginField = $request->input('email'); // can be email or username

    // Check if input is an email
    $fieldType = filter_var($loginField, FILTER_VALIDATE_EMAIL) ? 'email' : 'name';

    // Attempt login using either email or username
    if (Auth::attempt([$fieldType => $loginField, 'password' => $request->password])) {
        $request->session()->regenerate();
        return redirect()->route('dashboard');
    }

    // If authentication fails
    throw ValidationException::withMessages([
        'email' => 'Invalid email/username or password.',
    ]);
}

}
