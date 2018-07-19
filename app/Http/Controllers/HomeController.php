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
    public function forgetPass(Request $request) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $input_pin = $request->get('pin');
            $input_pass = $request->get('password');
//                $input_pin = '12345678';
            $user_name = $request->get('email');
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
            if ($old_pin == $input_pin) {
                $hashed_pass = DB::connection('mysql')->table('idtable2')->selectRaw("OLD_PASSWORD ('{$input_pass}') as 'pass'")->get();
                DB::connection('mysql')->update("UPDATE {$table} SET passwd = '{$hashed_pass[0]->pass}' WHERE id = '{$user_name}'");
                $request->session()->put('username', $user_name);
                return redirect('/');
            } else
                return view('reset')->withMessage('error');
        }
        return view('reset')->with('page', 'account');
    }

    public function account(Request $request) {
        if ($request->session()->get('username') != NULL) {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $id = $request->session()->get('username');
                $email = $request->get('email');
                $pin = $request->get('pin');
                $a = $id;
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
                DB::connection('mysql')->update("UPDATE {$table} SET trueId = '{$pin}', email = '{$email}' WHERE id = '{$id}'");
                return view('account')->with('page', 'account')->with('message', 'success');
            }
            return view('account')->with('page', 'account');
        }
        return redirect('/');
    }

    public function logoutmanual(Request $request) {
        $request->session()->forget('username');
        return redirect('/');
    }

    public function loginmanual(Request $request) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $request->get('name');
            $pass = $request->get('password');
            $hashed_pass = DB::connection('mysql')->table('idtable2')->selectRaw("OLD_PASSWORD ('{$pass}') as 'pass'")->get();
            $a = $username;
            $letter = $a['0'];
            $table = '';
            if (preg_match("/[aA-dD0-9]/", $letter)) {
                $table = "idtable1";
            } else if (preg_match("/[eE-iI]/", $letter)) {
                $table = "idtable2";
            } else if (preg_match("/[eJ-nN]/", $letter)) {
                $table = "idtable3";
            } else if (preg_match("/[oO-sS]/", $letter)) {
                $table = "idtable4";
            } else if (preg_match("/[tT-zZ]/", $letter)) {
                $table = "idtable5";
            } else {
                $table = "idtable5";
            }
            $registered_id = DB::connection('mysql')->table($table)->select('passwd')->where('id', $a)->get();
            if (count($registered_id) > 0) {
                if ($registered_id[0]->passwd == $hashed_pass[0]->pass) { //authenticated
                    $request->session()->put('username', $username);
                    return redirect('/');
                }
            }
            return view('auth.login')->with('messages', 'gagalLogin');
        }
        return redirect('/');
    }

    public function index(Request $request) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST')
            if ($request->session()->get('username') != NULL) {
                $input_pin = $request->get('pin');
                $input_pass = $request->get('psw');
//                $input_pin = '12345678';
                $user_name = $request->session()->get('username');
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
                if ($old_pin == $input_pin) {
                    $hashed_pass = DB::connection('mysql')->table('idtable2')->selectRaw("OLD_PASSWORD ('{$input_pass}') as 'pass'")->get();
                    DB::connection('mysql')->update("UPDATE {$table} SET passwd = '{$hashed_pass[0]->pass}' WHERE id = '{$user_name}'");
                    return view('home')->withMessage('success');
                } else
                    return view('home')->withMessage('error');
            }
        return view('home');
    }

    public function browse($id) {
        $data = DB::connection('mysql2')->table('content')->where('id', $id)->first();
        return view('event')->with('eventdata', $data);
    }

    public function checkPIN(Request $request) {

        return view('auth.login');
    }

}
