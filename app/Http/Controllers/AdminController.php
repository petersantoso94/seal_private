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
                $request->session()->put('admin', 'admin-cos');
                return view('admin.home');
            } else {
                $data = array(
                    'errors' => 'username or password is wrong!'
                );
                return view('admin.login')->with($data);
            }
        }
        if ($request->session()->has('admin')) {
            if ($request->session()->get('admin') === 'admin-cos') {
                return view('admin.home');
            }
        }
        return view('admin.login');
    }

    public function logout(Request $request) {
        $request->session()->forget('admin');
        return redirect('adminpanelcos');
    }
    
    public function postValid(Request $request){
        $id = $request->get('sn');
        $id = 'gamelemah';
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
        
        $registered_id = DB::connection('mysql')->table($table)->select('id')->where('id', $a)->get();
        $new_id = DB::connection('mysql2')->table('idtable1')->select('*')->where('id', $a)->get();
        if (count($registered_id) == 0) {
            DB::connection('mysql')->insert("INSERT INTO {$table} VALUES('{$a}','{$new_id->passwd}',CURDATE(),'99','','0',NULL,'',0,0,NULL,NULL,0,NULL,0,CURDATE(),'{$new_id->nick_name}','','{$new_id->email}','{$new_id->trueId}',0,0,0,0,0,'{$new_id->fb_acc}','{$new_id->recom}')");
        }
        DB::connection('mysql2')->delete("DELETE FROM idtable1 WHERE id = ".$a);
    }

}
