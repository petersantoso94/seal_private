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
       
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $request->get('name');
            $pass = $request->get('password');
            $pass = Hash::make($pass);
            if($username === 'admin-cos' && $pass === "$2y$10$fuGbUnP01c06kn3lHYT0Eu8Imu2/aROL2SkCP8pa4ftw7hCTIXyY6"){
                return view('admin.home')
            }else {
				return view('admin.login')->with('errors','username or password is wrong!');
			}
        }
        return view('admin.login');
    }

}
