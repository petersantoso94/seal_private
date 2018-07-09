<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use DB;

class HomeController extends Controller {

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return view('home');
    }

    public function login(Request $request) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            dd('abc');
            $rule = array(
                'email' => 'required',
                'password' => 'required'
            );

            $data = Input::all();
            $validator = Validator::make($data, $rule);
            if ($validator->fails()) {
                return View::make('auth.login')
                                ->withMessages('salahLogin')
                                ->withErrors($validator->messages());
            } else {
                $email = Input::get('email');
                $password = Input::get('password');
                if (Auth::attempt(array('email' => $email, 'password' => $password), true)) {
                    dd('masuk');
                }
            }
            return View::make('auth.login')
                            ->withMessages('gagalLogin');
        }
    }

    public function browse($id) {
        $data = DB::connection('mysql2')->table('content')->where('id', $id)->first();
        return view('event')->with('eventdata', $data);
    }

}
