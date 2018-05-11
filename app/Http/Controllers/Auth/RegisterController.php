<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use DB;
use Session;
use App\Quotation;

class RegisterController extends Controller {
    /*
      |--------------------------------------------------------------------------
      | Register Controller
      |--------------------------------------------------------------------------
      |
      | This controller handles the registration of new users as well as their
      | validation and creation. By default this controller uses a trait to
      | provide this functionality without requiring any additional code.
      |
     */

use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
   public function __construct() {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data) {
        return Validator::make($data, [
                    'name' => 'required|string|max:255',
                    'email' => 'required|string|email|max:255',
                    'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data) {
        $a = $data['name'];
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
        $registered_id = DB::table('users')->select('id')->where('name', $a)->get();
		$nick_name = Session::get('fb_name');
		$fb_id = Session::get('fb_id');
		$hashed_pass = DB::table('idtable2')->selectRaw("OLD_PASSWORD ('{$data['password']}') as 'pass'")->get();
		//dd($hashed_pass[0]->pass);
		//dd("INSERT INTO {$table} VALUES({$a},{$hashed_pass},CURDATE(),NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,{$nick_name},NULL,{$data['email']},NULL,NULL,NULL,NULL,NULL,NULL,{$fb_id},{$data['rcm']})");
        DB::insert("INSERT INTO {$table} VALUES('{$a}','{$hashed_pass[0]->pass}',CURDATE(),'99','','0',NULL,'',0,0,NULL,NULL,0,NULL,0,CURDATE(),'{$nick_name}','','{$data['email']}','{$data['pin']}',0,0,0,0,0,'{$fb_id}','{$data['rcm']}')");
			Session::forget('fb_id');
        
		return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }

}
