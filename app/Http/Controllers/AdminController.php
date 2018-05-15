<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller {

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = INPUT::get('email');
            $pass = INPUT::get('password');
            $pass = 'admin123';
            $pass = Hash::make($pass);
            dd($pass);
            if($username === 'admin-cos'){
                
            }
        }
        return view('home');
    }

}
