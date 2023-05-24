<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function check(Request $request) {

        $validated = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);

        $user = User::where('email', $validated['email'])
                  ->where('password', md5($validated['password']))
                  ->first();

        if(!$user) {
            return response()->json([
                'status' => false,
                'message' => "Fail"
            ]);
        } else {
            Auth::login($user);
            
            return response()->json([ 
                'status' => true ,
                'message' => "Success"
            ]);
        };
    }
}
