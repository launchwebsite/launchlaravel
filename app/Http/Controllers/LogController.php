<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\ValidationException;
// use App\Models\User;
// use Illuminate\Support\Facades\Hash;

class LogController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function loginuser(Request $request)
    {

        $validation = $request->validate([
            'email'    => 'required|email|exists:users,email',
            'password' => ['required', Password::min(8)->letters()->mixedCase()->symbols()],
        ]);

        if (Auth::attempt($validation)) {

            //for storing the login token.
            $request->session()->regenerate();
            return redirect()->route('page.dashboard');

        } else {
            throw ValidationException::withMessages([
                'email' => ['Those credentials does not match'],
            ]);

        }

    }

// public function register()
// {
//     return view('auth.login'); // SAME page reuse
// }

// public function registerUser(Request $request)
// {
//     $request->validate([
//         'name' => 'required|string|max:255',
//         'email' => 'required|email|unique:users,email',
//         'password' => ['required', 'confirmed', Password::min(8)->letters()->mixedCase()->symbols()],
//         'password' => 'required',
//     ]);

//     User::create([
//         'name' => $request->name,
//         'email' => $request->email,
//         'password' => Hash::make($request->password),
//     ]);

//     return redirect()->route('login')->with('success', 'Account created successfully');
// }

    public function logout()
    {

        Auth::logout();
        return redirect()->route('login');

    }
}
