<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use DB;

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
            $pass = md5($request->get('password'));
            if ($username === 'admin-cos' && $pass === "3c2e6ca89eb0e4d31ef256bef2ba24f2") {#SeaLcosGameMasterDERIANasher#1
                $request->session()->put('admin', 'admin-cos');
                return view('admin.home')->withPage('Approve User');
            } else {
                $data = array(
                    'errors' => 'username or password is wrong!'
                );
                return view('admin.login')->with($data);
            }
        }
        if ($request->session()->has('admin')) {
            if ($request->session()->get('admin') === 'admin-cos') {
                return view('admin.home')->withPage('Approve User');
            }
        }
        return view('admin.login');
    }

    public function logout(Request $request) {
        $request->session()->forget('admin');
        return redirect('adminpanelcos');
    }

    public function sendcash(Request $request) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            
        }
        if ($request->session()->has('admin')) {
            if ($request->session()->get('admin') === 'admin-cos') {
                return view('admin.editpage')->withPage('Edit Front Page');
            }
        }
        return view('admin.login');
    }

    public function editpage(Request $request) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            
        }
        if ($request->session()->has('admin')) {
            if ($request->session()->get('admin') === 'admin-cos') {
                return view('admin.sendcash')->withPage('Send Cash');
            }
        }
        return view('admin.login');
    }

    public function postCash(Request $request) {
        if ($request->session()->has('admin')) {
            if ($request->session()->get('admin') === 'admin-cos') {
                $ids = $request->get('users');
                //        $ids = 'gm01,derianasher';
                //        $ids = explode(',', $ids);
                $cash = $request->get('nominal');
                //        $cash = 100;
                foreach ($ids as $id) {
                    $a = $id;
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
                    $registered_id = DB::connection('mysql')->table($table)->where('id', $a)->get();
                    if (count($registered_id) > 0) {
                        DB::update("UPDATE {$table} SET point = point + {$cash} WHERE id = '{$a}'");
                    }
                }
            }
        }
        return view('admin.login');
    }

    public function postItems(Request $request) {
        if ($request->session()->has('admin')) {
            if ($request->session()->get('admin') === 'admin-cos') {
                $ids = $request->get('users');
                $it_val = $request->get('it');
                $io_val = $request->get('io');
                //$it_val = '3352';
                //$io_val = '300';
                //$ids = 'gm01';
                //        $ids = explode(',', $ids);
                $not_avail = '';
                foreach ($ids as $id) {
                    $registered_id = DB::connection('mysql3')->table('store')->where('user_id', $id)->get();
                    if (count($registered_id) > 0) {
                        foreach ($registered_id as $user) {
                            $idx_kosong = 99;
                            for ($i = 0; $i < 80; $i++) {
                                $stringio = 'io' . $i;
                                $stringit = 'it' . $i;
                                if ($user->$stringio == 0 && $user->$stringit == 0) {
                                    $idx_kosong = $i;
                                    break;
                                }
                            }
                            if ($idx_kosong < 99) {
                                DB::connection('mysql3')->update("UPDATE store SET io" . $idx_kosong . " = '{$io_val}', it" . $idx_kosong . " = '{$it_val}' WHERE user_id = '{$id}'");
                            } else {
                                $not_avail .= ' ' . $id;
                            }
                        }
                    }
                }
                return $not_avail;
            }
        }
        return view('admin.login');
    }

    public function postItemsAdd(Request $request) {
        if ($request->session()->has('admin')) {
            if ($request->session()->get('admin') === 'admin-cos') {
                $ids = $request->get('users');
                $it_val = $request->get('it');
                $io_val = $request->get('io');
                //$it_val = '3352';
                //$io_val = '300';
                //$ids = 'gm01';
                //$ids = explode(',', $ids);
                foreach ($ids as $id) {
                    DB::connection('mysql4')->update("INSERT INTO seal_item (ItemLimit, ItemType, OwnerID, ItemOp1, ItemOp2, OwnerDate, bxaid) VALUES('{$io_val}','{$it_val}','{$id}',0,0, CURDATE(), 'SEND')");
                }
                return "success";
            }
        }
        return view('admin.login');
    }

    public function postValid(Request $request) {
        if ($request->session()->has('admin')) {
            if ($request->session()->get('admin') === 'admin-cos') {
                $id = $request->get('sn');
                //$id = 'gamelemah2';
                $a = $id;
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

                $registered_id = DB::connection('mysql')->table($table)->select('id')->where('id', $a)->get();
                $new_id = DB::connection('mysql2')->table('idtable1')->select('*')->where('id', $a)->get();
                $new_id = $new_id[0];
                if (count($registered_id) == 0) {
                    DB::connection('mysql')->insert("INSERT INTO {$table} VALUES('{$a}','{$new_id->passwd}',CURDATE(),'99','','0',NULL,'',0,0,NULL,NULL,0,NULL,0,CURDATE(),'{$new_id->nick_name}','','{$new_id->email}','{$new_id->trueId}',0,0,0,0,0,'{$new_id->fb_acc}','{$new_id->recom}')");
                    DB::connection('mysql2')->delete("DELETE FROM idtable1 WHERE id = '" . $a . "'");
                    DB::connection('mysql2')->delete("DELETE FROM users WHERE name = '" . $a . "'");
                }
            }
        }
        return view('admin.login');
    }

    public function postDelete(Request $request) {
        if ($request->session()->has('admin')) {
            if ($request->session()->get('admin') === 'admin-cos') {
                $id = $request->get('sn');
                DB::connection('mysql2')->delete("DELETE FROM idtable1 WHERE id = '" . $id . "'");
                DB::connection('mysql2')->delete("DELETE FROM users WHERE name = '" . $id . "'");
            }
        }
        return view('admin.login');
    }

}
