<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Infrastructure\Persistent\Eloquent\AdminUserModel;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    //
    public function register(Request $request){
        $incomingData = $request->all();

        Validator::make($incomingData, [
            'username' => 'required|string',
            'firstname' => 'required|string',
            'lastname' => 'required|string',
            'password' => 'required|string',
            'confirmation_password' => 'required|same:password'
        ]);
        AdminUserModel::create([
            'username' => $request->username,
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'password' => Hash::make($request->password)
        ]);

        return redirect('/LoginPage');
        
    }
}
