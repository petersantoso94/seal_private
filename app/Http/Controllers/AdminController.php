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
            $username = $request->get('email');
            $pass = $request->get('password');
            if ($username === 'admin-cos' && $pass === "admin123") {
				$request->session()->put('admin','admin-cos');
                return view('admin.home');
            } else {
				$data = array(
            'errors'=>'username or password is wrong!'
            );
                return view('admin.login')->with($data);
            }
        }
		if($request->session()->has('admin')){
			if($request->session()->get('admin') === 'admin-cos'){
				return view('admin.home');
			}
		}
        return view('admin.login');
    }
	
	public function logout(Request $request) {
		$request->session()->forget('admin');
		return redirect('adminpanelcos');
	}

}
