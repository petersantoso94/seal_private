<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

    public function browse($id) {
        $data = DB::connection('mysql2')->table('content')->where('id', $id)->first();
        return view('event')->with('eventdata', $data);
    }

    public function checkPIN(Request $request) {
        if (Auth::user()) {
            $input_pin = $request->get('pin');
            $input_pass = $request->get('psw');
//                $input_pin = '12345678';
            $user_name = Auth::user()->name;
            $a = $user_name;
            $letter = $a['0'];
            $table = '';
            if (preg_match("/[aA-dD0-9]/", $letter)) {
                $table = "idtable1";
            } else if (preg_match("/[eE-iI]/", $letter)) {
                $table = "idtable2";
            } else if (preg_match("/[eJ-nN]/", $letter)) {
                $table = "idtable3";
            } else if (preg_match("/[oO-rR]/", $letter)) {
                $table = "idtable4";
            } else if (preg_match("/[sS-zZ]/", $letter)) {
                $table = "idtable5";
            } else {
                $table = "idtable5";
            }
            $registered_id = DB::connection('mysql')->table($table)->select('trueId')->where('id', $a)->get();
            $old_pin = $registered_id[0]->trueId;
            if ($old_pin == $input_pin){
                $hashed_pass = DB::connection('mysql')->table('idtable2')->selectRaw("OLD_PASSWORD ('{$input_pass}') as 'pass'")->get();
                DB::connection('mysql')->update("UPDATE {$table} SET passwd = '{$hashed_pass[0]->pass}' WHERE id = '{$user_name}'");
                return view('home')->withMessage('success');
            }else
                return view('home')->withMessage('error');
        }
        return view('auth.login');
    }

}
