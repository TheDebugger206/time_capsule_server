<?php

namespace App\Services\User;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class UserService
{

    static function register($data)
    {
        $data = $data->only(['first_name', 'last_name', 'email', 'password']);
        $data['password'] = Hash::make($data['password']);
        $user = User::create($data);
        return $user;

        // there are 2 ways to create a user

        // and the second is better

        User::creaate

            or

            $user = new User();
        $user->first_name = $_REQUEST->first_name;

        $user -> save();
        $token = Auth::login($user);
        $user->token = $token;
        return 

        // dont group routes by contorller
        // group routes by features
        // better to group by prefix
        // user admin guest
        // guest -> no need for authentication

        // php artisan install:api

        // the main goal of token is to reach an api

        // we never return a response from the servcie
        
    }

}