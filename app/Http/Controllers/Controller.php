<?php

namespace App\Http\Controllers;
use App\Models\Station;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController{
    public function index()
    {
        return view('index');
    }
    public function tickets(){
        return view('tickets');
    }
    public function register(){
        return view('register-page');
    }
    public function login()
    {
        return view('login');
    }

    public function code(){
        return view('code');
    }
}
