<?php

namespace App\Services;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class Admin implements AdminAuthenticate {
    
    public function login(Request $request){

        $credentials = $request->only('name', 'password');
        

        if (Auth::attempt($credentials)) {
            
            return response('', 200);
        }

        return response('', 422);
    }

    public function check(Request $request): bool{

        return Auth::check();
    }
}