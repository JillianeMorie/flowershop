<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'age' => 'required|numeric|min:18',
            'address' => 'required|string',
            'phone' => 'required|string',
            'gender' => 'required|string|in:male,female',
            'status' => 'required|string|in:single,married,widow',
            'citizenship' => 'required|string',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        try {
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'age' => $request->age,
                'address' => $request->address,
                'phone' => $request->phone,
                'gender' => $request->gender,
                'status' => $request->status,
                'citizenship' => $request->citizenship,
                'role' => 'customer', // Default role for new registrations
            ]);

            // Log the user in after registration
            auth()->login($user);

            return redirect()
                ->route('home')
                ->with('success', 'Registration successful! Welcome to Flower Shop.');

        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->with('error', 'Registration failed. Please try again.')
                ->withInput();
        }
    }
}
