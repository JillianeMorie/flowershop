<?php

namespace App\Http\Controllers;

// use App\Http\Controllers\Controller;
// use App\Models\User;
// use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Hash;
// use Illuminate\Support\Facades\Validator;

abstract class Controller
{
    // public function register(Request $request)
    // {
    //     $validator = Validator::make($request->all(), [
    //         'name' => 'required|string|max:255',
    //         'email' => 'required|string|email|max:255|unique:users',
    //         'password' => 'required|string|min:8',
    //         'age' => 'required|numeric',
    //         'address' => 'required|string',
    //         'phone' => 'required|string',
    //         'gender' => 'required|string|in:male,female',
    //         'status' => 'required|string|in:single,married,widow',
    //         'citizenship' => 'required|string',
    //     ]);

    //     if ($validator->fails()) {
    //         return response()->json(['errors' => $validator->errors()], 422);
    //     }

    //     $user = User::create([
    //         'name' => $request->name,
    //         'email' => $request->email,
    //         'password' => Hash::make($request->password),
    //         'age' => $request->age,
    //         'address' => $request->address,
    //         'phone' => $request->phone,
    //         'gender' => $request->gender,
    //         'status' => $request->status,
    //         'citizenship' => $request->citizenship,
    //     ]);

    //     $token = $user->createToken('auth_token')->plainTextToken;

    //     return response()->json([
    //         'user' => $user,
    //         'token' => $token,
    //         'message' => 'Registration successful'
    //     ], 201);
    // }
}
