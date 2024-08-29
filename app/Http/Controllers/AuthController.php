<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Hash;
use App\Http\Controllers\ApiController;

class AuthController extends ApiController
{
    public function login(Request $request)
    {

        $request->validate([
            
            'email' => 'required|email',
            'password' => 'required'

        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {

            return response()->json(['Message' => 'not found user '], 404);
        }
        $token = $user->createToken($user->role)->plainTextToken;
        return $this->successResponse(['token'=>$token]);
    }
}