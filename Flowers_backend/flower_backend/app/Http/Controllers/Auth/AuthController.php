<?php

namespace App\Http\Controllers\Auth;  // Ensure correct namespace

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    // Show login form
    public function showLoginForm()
    {
        return view('components.Auth.LoginPage');
    }

    // Handle login attempt
    public function login(Request $request)
    {
        // Validate input data
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        // Attempt to log the user in
        if (Auth::attempt(['username' => $request->username, 'password' => $request->password])) {
            // Redirect to admin dashboard if successful
            return redirect()->route('Dashboard.page');
        } else {
            // Redirect back with an error message if failed
            return back()->withErrors(['username' => 'Invalid credentials']);
        }
    }

    // Show register form
    public function showRegisterForm()
    {
        return view('components.Auth.RegisterPage');
    }

    // Handle user registration
    public function register(Request $request)
    {
        // Validate input data
        $request->validate([
            'username' => 'required|unique:users,username',
            'password' => 'required|confirmed',
        ]);

        // Create a new user
        $user = User::create([
            'username' => $request->username,
            'password' => Hash::make($request->password),
        ]);

        // Log the user in
        Auth::login($user);

        // Redirect to the dashboard after registration
        return redirect()->route('Dashboard.page');
    }

    // Handle logout
    public function logout()
    {
        Auth::logout();  // Log the user out
        return redirect()->route('Login.page'); // Redirect to login page
    }
}
