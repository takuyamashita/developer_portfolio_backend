<?php

namespace App\Services;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

interface AdminAuthenticate {
    public function login(Request $request);
    
    public function check(Request $request):bool;
}
