<?php

namespace App\Http\Controllers;

use App\Services\AdminAuthenticate;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    private $admin;

    public function __construct(AdminAuthenticate $admin)
    {
        $this->admin = $admin;
    }
    
    public function login(Request $request){

        return $this->admin->login($request);
    }

    public function check(Request $request){

        return;
    }
}
