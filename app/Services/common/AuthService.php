<?php

namespace App\Services\common;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthService
{

    static public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string'
        ]);

        // from the request only taking the attributes that i want
        $credentials = $request->only('email', 'password');

        // authenticated -> already loggedIn
        // here we are attempting we are logged in
        $token = Auth::attempt($credentials);

        if (!$token) {
            return null;
        }

        $user = Auth::user(); // user is now an obj
        $user->token = $token;
        // i can add any attribute i want
        // add attribute to the user
        // now the user obj has its own token
        return $user;
    }

    static public function register(Request $request)
    {

        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:6'
        ], );

        $user = new User;
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        //
        $token = Auth::login($user);

        $user->token = $token;
        return $user;

    }

}
