<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller { 
    public function store(Request $request) {
    $input = $request->all();
    User::create([
        'first_name' => $input['first_name'],
        'last_name' => $input['last_name'],
        'email' => $input['email'],
        'password' => md5($input['password']),
        'phone' => $input['phone']
    ]);
 
    return response()->json([
        'status' => true,
        'message' => "Registation Success"
    ]);
    }
}
