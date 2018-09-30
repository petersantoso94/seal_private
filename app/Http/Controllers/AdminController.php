<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use DB;

class AdminController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function getUserData(Request $request)
    {
        if ($request->session()->has('admin')) {
            if ($request->session()->get('role') >= 0) {
                $user = $request->get('users');
                $user_data = DB::connection('mysql3')->table('pc')->select('*')->where('char_name', $user)->get();
                return $user_data;
            }
        }
        return view('admin.login');
    }

    public function editcharacter(Request $request)
    {
        if ($request->session()->has('admin')) {
            if ($request->session()->get('role') >= 0) {
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    if ($request->get('tipe') === 'edit') {
                        $users = $request->get('users');
                        $map = $request->get('map');
                        $level = $request->get('level');
                        $job = $request->get('job');
                        $exp = $request->get('exp');
                        $money = $request->get('money');
                        $fame = $request->get('fame');
                        $str = $request->get('str');
                        $intel = $request->get('intel');
                        $dex = $request->get('dex');
                        $cons = $request->get('cons');
                        $mental = $request->get('mental');
                        $sense = $request->get('sense');
                        $lvluppoint = $request->get('lvluppoint');
                        $skilluppoint = $request->get('skilluppoint');
                        $exppoint = $request->get('exppoint');
                        $playflag = $request->get('playflag');

                        $admin = $request->session()->get('admin');
                        $log_text = "editing character " . $users;
                        if ($request->session()->get('role') === 0) {
                            DB::connection('mysql3')->insert("UPDATE pc SET `map_num`='{$map}',`level`='{$level}',`play_flag`='{$playflag}',"
                                . "`job`='{$job}',`exp`='{$exp}',`money`='{$money}',`fame`='{$fame}',`strength`='{$str}',`intelligence`='{$intel}',`dexterity`='{$dex}' "
                                . ",`constitution`='{$cons}' ,`mentality`='{$mental}',`sense`='{$sense}',`levelup_point`='{$lvluppoint}',`skillup_point`='{$skilluppoint}',`expert_skillup_point`='{$exppoint}'"
                                . "WHERE `char_name`='{$users}'");
                        } else if ($request->session()->get('role') > 0) {
                            DB::connection('mysql2')->insert("INSERT INTO confirmCharacter (`users`,`map`,`level`,`job`,`exp`,`money`,`fame`,`str`,`intel`,`dex`,`cons`,`mental`,`sense`,`lvluppoint`,`skilluppoint`,`exppoint`,`playflag`) VALUE ('{$users}','{$map}','{$level}','{$job}','{$exp}','{$money}','{$fame}','{$str}','{$intel}','{$dex}','{$cons}','{$mental}','{$sense}','{$lvluppoint}','{$skilluppoint}','{$exppoint}','{$playflag}')");
                            $log_text = "editing character " . $users . " need confirm";
                        }

                        DB::connection('mysql2')->insert("INSERT INTO logs (`admin_id`,`logs_detail`,`timestamp`,`ip`) VALUE ('{$admin}','{$log_text}',CURDATE(),'{$request->ip()}')");
                        return view('admin.editcharacter')->withPage('Edit Character')->withSuccess('Sukses Edit Character');
                    } else if ($request->get('tipe') === 'ban') {
                        $users = $request->get('users');

                        $a = $users;
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
                            $admin = $request->session()->get('admin');
                            $log_text = "ban character " . $users;
                            if ($request->session()->get('role') === 0) {
                                DB::update("UPDATE {$table} SET game_block = '2030-01-01 00:00:00' WHERE id = '{$a}'");
                            } else if ($request->session()->get('role') > 0) {
                                $log_text = "ban character " . $users . " need confirm";
                                DB::connection('mysql2')->insert("INSERT INTO confirmBan (`table`,`users`) VALUE ('{$table}','{$a}')");
                            }

                            DB::connection('mysql2')->insert("INSERT INTO logs (`admin_id`,`logs_detail`,`timestamp`,`ip`) VALUE ('{$admin}','{$log_text}',CURDATE(),'{$request->ip()}')");
                            return view('admin.editcharacter')->withPage('Edit Character')->withSuccessban('Sukses Ban Character');
                        }
                    }
                }
                return view('admin.editcharacter')->withPage('Edit Character');
            }
        }
        return view('admin.login');
    }

    public function addadmin(Request $request)
    {
        if ($request->session()->has('admin')) {
            if ($request->session()->get('role') >= 0) {
                $data = [];
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    $id = $request->get('username');
                    $pass = md5($request->get('password'));

                    $user_data = DB::connection('mysql2')->table('admin')->select('*')->where('name', $id)->get();
                    if (count($user_data) > 0)
                        return view('admin.addadmin')->withPage('Add Admin')->withError('Duplicate Admin ID');

                    $admin = $request->session()->get('admin');
                    DB::connection('mysql2')->insert("INSERT INTO admin (`name`,`password`,`role`,`created_at`,`updated_at`,`admin_id`) VALUE ('{$id}','{$pass}','1',CURDATE(),CURDATE(),'{$admin}')");

                    $log_text = "add admin";
                    DB::connection('mysql2')->insert("INSERT INTO logs (`admin_id`,`logs_detail`,`timestamp`,`ip`) VALUE ('{$admin}','{$log_text}',CURDATE(),'{$request->ip()}')");
                    return view('admin.addadmin')->withPage('Add Admin')->withSuccess('Sukses Add Admin');
                }
                return view('admin.addadmin')->withPage('Add Admin');
            }
        }
        return view('admin.login');
    }

    public function index(Request $request)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $request->get('email');
            $pass = md5($request->get('password'));
            $user_data = DB::connection('mysql2')->table('admin')->select('name', 'password', 'role')->where('name', $username)->get();
            if (count($user_data) > 0 && $user_data[0]->password === $pass) {#SeaLcosGameMasterDERIANasher#1
                $request->session()->put('admin', $user_data[0]->name);
                $request->session()->put('role', $user_data[0]->role);
                $admin = $request->session()->get('admin');
                $log_text = "admin login";
                DB::connection('mysql2')->insert("INSERT INTO logs (`admin_id`,`logs_detail`,`timestamp`,`ip`) VALUE ('{$admin}','{$log_text}',CURDATE(),'{$request->ip()}')");
                if ($user_data[0]->role === 0)
                    return view('admin.home')->withPage('Approve User');
                else
                    return redirect('sendcash');
            } else {
                $data = array(
                    'errors' => 'username or password is wrong!'
                );
                return view('admin.login')->with($data);
            }
        }
        if ($request->session()->has('admin')) {
            if ($request->session()->get('role') === 0)
                return view('admin.home')->withPage('Approve User');
            else
                return redirect('sendcash');
        }
        return view('admin.login');
    }

    public function logout(Request $request)
    {
        $admin = $request->session()->get('admin');
        $log_text = "admin logout";
        DB::connection('mysql2')->insert("INSERT INTO logs (`admin_id`,`logs_detail`,`timestamp`,`ip`) VALUE ('{$admin}','{$log_text}',CURDATE(),'{$request->ip()}')");
        $request->session()->forget('admin');
        $request->session()->forget('role');
        return redirect('adminpanelcos');
    }

    public function sendcash(Request $request)
    {
        if ($request->session()->has('admin')) {
            if ($request->session()->get('role') >= 0) {
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {

                }
                return view('admin.sendcash')->withPage('Send Cash');
            }
        }
        return view('admin.login');
    }

    public function editEvent(Request $request)
    {
        if ($request->session()->has('admin')) {
            if ($request->session()->get('role') >= 0) {
                $data = [];
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    $id = $request->get('sn');
                    $existed_event = DB::connection('mysql2')->table('content')->where('id', $id)->select('*')->first();
                    $data['content'] = html_entity_decode($existed_event->content);
                    $data['id'] = $existed_event->id;
                    $data['name'] = $existed_event->name;
                    $data['horizontal_level'] = $existed_event->horizontal_level;
                    return $data;
                }
                return view('admin.editpage')->withPage('Edit Front Page');
            }
        }
        return view('admin.login');
    }

    public function editpage(Request $request)
    {
        if ($request->session()->has('admin')) {
            if ($request->session()->get('role') >= 0) {
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    if ($request->get('tipe') === 'insert') {
                        $data = trim($request->get('editor1'));
                        $category = $request->get('category');
                        $pagename = $request->get('pagename');
                        $new_name = '';
                        $vert_number = 1;
                        $approve = '0';
                        if ($request->session()->get('role') === 0)
                            $approve = '1';

                        if ($request->get('newcategory')) {
                            $horizontal = DB::connection('mysql2')->table('content')->orderBy('horizontal_level', 'DESC')->select('horizontal_level')->first();
                            $new_name = $request->get('newcategory');
                            $category = $horizontal->horizontal_level + 1;
                        } else {
                            $vertical = DB::connection('mysql2')->table('content')->orderBy('vertical_level', 'DESC')->where('horizontal_level', $category)->select('vertical_level', 'horizontal_name')->first();
                            $new_name = $vertical->horizontal_name;
                            $vert_number = $vertical->vertical_level + 1;
                        }
                        if ($data != "" && $data != NULL) {
                            $data = stripslashes($data);
                            $data = htmlspecialchars($data);
                            DB::connection('mysql2')->insert("INSERT INTO content (`name`,`horizontal_level`,`vertical_level`,`content`,`horizontal_name`,`approved`) VALUE ('{$pagename}','{$category}','{$vert_number}','{$data}','{$new_name}','{$approve}')");

                            $admin = $request->session()->get('admin');
                            $log_text = "Inserting front page " . $pagename;
                            DB::connection('mysql2')->insert("INSERT INTO logs (`admin_id`,`logs_detail`,`timestamp`,`ip`) VALUE ('{$admin}','{$log_text}',CURDATE(),'{$request->ip()}')");
                            return view('admin.editpage')->withPage('Edit Front Page')->withSuccess('Sukses Insert Event');
                        }
                        return view('admin.editpage')->withPage('Edit Front Page')->withError('Error Data Kosong');
                    } else if ($request->get('tipe') === 'update') {
                        $data = trim($request->get('editor1'));
                        $category = $request->get('category');
                        $pagename = $request->get('pagename');
                        $id_update = $request->get('id_update');
                        $new_name = '';
                        $vert_number = 1;
                        if ($request->get('newcategory')) {
                            $horizontal = DB::connection('mysql2')->table('content')->orderBy('horizontal_level', 'DESC')->select('horizontal_level')->first();
                            $new_name = $request->get('newcategory');
                            $category = $horizontal->horizontal_level + 1;
                        } else {
                            $check_horizontal = DB::connection('mysql2')->table('content')->where('id', $id_update)->select('horizontal_level', 'horizontal_name', 'vertical_level')->first();
                            if ($check_horizontal->horizontal_level == $category) {
                                $new_name = $check_horizontal->horizontal_name;
                                $vert_number = $check_horizontal->vertical_level;
                            } else {
                                $vertical = DB::connection('mysql2')->table('content')->orderBy('vertical_level', 'DESC')->where('horizontal_level', $category)->select('vertical_level', 'horizontal_name')->first();
                                $new_name = $vertical->horizontal_name;
                                $vert_number = $vertical->vertical_level + 1;
                            }
                        }
                        if ($data != "" && $data != NULL) {
                            $data = stripslashes($data);
                            $data = htmlspecialchars($data);
                            DB::connection('mysql2')->insert("UPDATE content SET `name`='{$pagename}',`horizontal_level`='{$category}',`vertical_level`='{$vert_number}',`content`='{$data}',`horizontal_name`='{$new_name}' WHERE `id`='{$id_update}'");

                            $admin = $request->session()->get('admin');
                            $log_text = "Update front page " . $pagename;
                            DB::connection('mysql2')->insert("INSERT INTO logs (`admin_id`,`logs_detail`,`timestamp`,`ip`) VALUE ('{$admin}','{$log_text}',CURDATE(),'{$request->ip()}')");
                            return view('admin.editpage')->withPage('Edit Front Page')->withSuccess('Sukses Insert Event');
                        }
                        return view('admin.editpage')->withPage('Edit Front Page')->withError('Error Data Kosong');
                    }
                }
                return view('admin.editpage')->withPage('Edit Front Page');
            }
        }
        return view('admin.login');
    }

    public function editfanart(Request $request)
    {
        if ($request->session()->has('admin')) {
            if ($request->session()->get('role') >= 0) {
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    $input_image = $request->file('image');
                    if ($input_image != '') {
                        $imgnumber = DB::connection('mysql2')->table('fanart')->orderBy('id', 'DESC')->select('id')->first();
                        if (!$imgnumber) {
                            $imgnumber = 1;
                        } else {
                            $imgnumber = $imgnumber->id + 1;
                        }
                        $destination = base_path() . '/public/picture/';
                        $extention = $input_image->getClientOriginalExtension();
                        $filename = 'image_fanart' . $imgnumber . '.' . $extention;
                        $input_image->move($destination, $filename);
                        if ($request->session()->get('role') > 0)
                            DB::connection('mysql2')->insert("INSERT INTO fanart (`id`,`image`,`approved`) VALUE ('{$imgnumber}','{$filename}','0')");
                        else if ($request->session()->get('role') === 0)
                            DB::connection('mysql2')->insert("INSERT INTO fanart (`id`,`image`,`approved`) VALUE ('{$imgnumber}','{$filename}','1')");

                        $admin = $request->session()->get('admin');
                        $log_text = "Inserting fan art " . $imgnumber;
                        DB::connection('mysql2')->insert("INSERT INTO logs (`admin_id`,`logs_detail`,`timestamp`,`ip`) VALUE ('{$admin}','{$log_text}',CURDATE(),'{$request->ip()}')");
                        return view('admin.editfanart')->withPage('Edit Fan Art')->withSuccess('Sukses Insert Fan Art');
                    }
                    return view('admin.editfanart')->withPage('Edit Fan Art')->withError('Error Data Kosong');
                }
                return view('admin.editfanart')->withPage('Edit Fan Art');
            }
        }
        return view('admin.login');
    }

    public function editcostume(Request $request)
    {
        if ($request->session()->has('admin')) {
            if ($request->session()->get('role') >= 0) {
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    $input_image = $request->file('image');
                    $caption = $request->get('caption');
                    if ($input_image != '') {
                        $imgnumber = DB::connection('mysql2')->table('costume')->orderBy('id', 'DESC')->select('id')->first();
                        if (!$imgnumber) {
                            $imgnumber = 1;
                        } else {
                            $imgnumber = $imgnumber->id + 1;
                        }
                        $destination = base_path() . '/public/picture/';
                        $extention = $input_image->getClientOriginalExtension();
                        $filename = 'image_costume' . $imgnumber . '.' . $extention;
                        $input_image->move($destination, $filename);
                        if ($request->session()->get('role') > 0)
                            DB::connection('mysql2')->insert("INSERT INTO costume (`id`,`image`,`caption`,`approved`) VALUE ('{$imgnumber}','{$filename}','{$caption}','0')");
                        else if ($request->session()->get('role') === 0)
                            DB::connection('mysql2')->insert("INSERT INTO costume (`id`,`image`,`caption`,`approved`) VALUE ('{$imgnumber}','{$filename}','{$caption}','1')");

                        $admin = $request->session()->get('admin');
                        $log_text = "Inserting costume " . $imgnumber;
                        DB::connection('mysql2')->insert("INSERT INTO logs (`admin_id`,`logs_detail`,`timestamp`,`ip`) VALUE ('{$admin}','{$log_text}',CURDATE(),'{$request->ip()}')");
                        return view('admin.editcostume')->withPage('Edit Costume')->withSuccess('Sukses Insert Costume');
                    }
                    return view('admin.editcostume')->withPage('Edit Costume')->withError('Error Data Kosong');
                }
                return view('admin.editcostume')->withPage('Edit Costume');
            }
        }
        return view('admin.login');
    }

    public function editnews(Request $request)
    {
        if ($request->session()->has('admin')) {
            if ($request->session()->get('role') >= 0) {
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    $input_image = $request->file('image');
                    $input_title = $request->get('title');
                    $input_content = $request->get('content');
                    if ($input_image != '') {
                        $imgnumber = DB::connection('mysql2')->table('news')->orderBy('id', 'DESC')->select('id')->first();
                        if (!$imgnumber) {
                            $imgnumber = 1;
                        } else {
                            $imgnumber = $imgnumber->id + 1;
                        }
                        $destination = base_path() . '/public/picture/';
                        $extention = $input_image->getClientOriginalExtension();
                        $filename = 'image_news' . $imgnumber . '.' . $extention;
                        $input_image->move($destination, $filename);
                        if ($request->session()->get('role') > 0)
                            DB::connection('mysql2')->insert("INSERT INTO news (`id`,`image`,`title`,`content`,`approved`) VALUE ('{$imgnumber}','{$filename}','{$input_title}','{$input_content}', '0')");
                        else if ($request->session()->get('role') === 0)
                            DB::connection('mysql2')->insert("INSERT INTO news (`id`,`image`,`title`,`content`,`approved`) VALUE ('{$imgnumber}','{$filename}','{$input_title}','{$input_content}', '1')");

                        $admin = $request->session()->get('admin');
                        $log_text = "Inserting news " . $imgnumber;
                        DB::connection('mysql2')->insert("INSERT INTO logs (`admin_id`,`logs_detail`,`timestamp`,`ip`) VALUE ('{$admin}','{$log_text}',CURDATE(),'{$request->ip()}')");

                        return view('admin.editnews')->withPage('Edit News')->withSuccess('Sukses Insert News');
                    }
                    return view('admin.editnews')->withPage('Edit News')->withError('Error Data Kosong');
                }
                return view('admin.editnews')->withPage('Edit News');
            }
        }
        return view('admin.login');
    }

    public function confirmCash(Request $request)
    {
        if ($request->session()->has('admin')) {
            if ($request->session()->get('role') == 0) {
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {

                }
                return view('admin.confirmCash')->withPage('Confirm Cash');
            }
        }
        return view('admin.login');
    }

    public function postConfirmCash(Request $request)
    {
        if ($request->session()->has('admin')) {
            if ($request->session()->get('role') == 0) {
                $id = $request->get('id');

                $table = $request->get('table');
                $a = $request->get('user');
                $cash = $request->get('cash');

                DB::update("UPDATE {$table} SET point = point + {$cash} WHERE id = '{$a}'");
                $admin = $request->session()->get('admin');

                $this->deleteCash($id);
                $log_text = "Confirm cash {$id}";
                DB::connection('mysql2')->insert("INSERT INTO logs (`admin_id`,`logs_detail`,`timestamp`,`ip`) VALUE ('{$admin}','{$log_text}',CURDATE(),'{$request->ip()}')");
            }
        }
        return view('admin.login');
    }

    public function postDeleteCash(Request $request)
    {
        if ($request->session()->has('admin')) {
            if ($request->session()->get('role') == 0) {
                $id = $request->get('sn');
                $this->deleteCash($id);
            }
        }
        return view('admin.login');
    }

    public function deleteCash(string $id)
    {
        DB::connection('mysql2')->delete("DELETE FROM confirmCash WHERE id = '" . $id . "'");
    }

    public function postCash(Request $request)
    {
        if ($request->session()->has('admin')) {
            if ($request->session()->get('role') >= 0) {
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
                        $admin = $request->session()->get('admin');
                        $log_text = "Set point {$a} +" . $cash;
                        if ($request->session()->get('role') === 0) {
                            DB::update("UPDATE {$table} SET point = point + {$cash} WHERE id = '{$a}'");
                        } else if ($request->session()->get('role') > 0) {
                            DB::connection('mysql2')->insert("INSERT INTO confirmCash (`table`,`cash`,`users`) VALUE ('{$table}','{$cash}','{$a}')");
                            $log_text = "Set point confirmation {$a} +" . $cash;
                        }
                        DB::connection('mysql2')->insert("INSERT INTO logs (`admin_id`,`logs_detail`,`timestamp`,`ip`) VALUE ('{$admin}','{$log_text}',CURDATE(),'{$request->ip()}')");

                    }
                }
            }
        }
        return view('admin.login');
    }


    public function postConfirmItem(Request $request)
    {
        if ($request->session()->has('admin')) {
            if ($request->session()->get('role') == 0) {
                $id = $request->get('id');

                $slot = $request->get('slot');
                $users = $request->get('user');
                $ioval = $request->get('ioval');
                $itval = $request->get('itval');
                $registered_id = DB::connection('mysql3')->table('store')->where('user_id', $users)->get();
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
                        if ($idx_kosong < 80) {
                            DB::connection('mysql3')->update("UPDATE store SET io" . $idx_kosong . " = '{$ioval}', it" . $idx_kosong . " = '{$itval}' WHERE user_id = '{$users}'");
                            $admin = $request->session()->get('admin');

                            $this->deleteItem($id);
                            $log_text = "Give item for {$users} ";
                            DB::connection('mysql2')->insert("INSERT INTO logs (`admin_id`,`logs_detail`,`timestamp`,`ip`) VALUE ('{$admin}','{$log_text}',CURDATE(),'{$request->ip()}')");
                        }
                    }
                }

            }
        }
        return view('admin.login');
    }

    public function postDeleteItem(Request $request)
    {
        if ($request->session()->has('admin')) {
            if ($request->session()->get('role') == 0) {
                $id = $request->get('sn');
                $this->deleteItem($id);
            }
        }
        return view('admin.login');
    }

    public function deleteItem(string $id)
    {
        DB::connection('mysql2')->delete("DELETE FROM confirmItem WHERE id = '" . $id . "'");
    }

    public function postItems(Request $request)
    {
        if ($request->session()->has('admin')) {
            if ($request->session()->get('role') >= 0) {
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
                            if ($idx_kosong < 80) {
                                $admin = $request->session()->get('admin');
                                $log_text = "Give item for {$id} ";
                                if ($request->session()->get('role') === 0) {
                                    DB::connection('mysql3')->update("UPDATE store SET io" . $idx_kosong . " = '{$io_val}', it" . $idx_kosong . " = '{$it_val}' WHERE user_id = '{$id}'");
                                } else if ($request->session()->get('role') > 0) {
                                    DB::connection('mysql2')->insert("INSERT INTO confirmItem (`slot`,`io_val`,`it_val`,`users`) VALUE ('{$idx_kosong}','{$io_val}','{$it_val}','{$id}')");
                                    $log_text = "Give item for {$id} need confirm";
                                }

                                DB::connection('mysql2')->insert("INSERT INTO logs (`admin_id`,`logs_detail`,`timestamp`,`ip`) VALUE ('{$admin}','{$log_text}',CURDATE(),'{$request->ip()}')");
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

    public function postConfirmItemAdd(Request $request)
    {
        if ($request->session()->has('admin')) {
            if ($request->session()->get('role') == 0) {
                $id = $request->get('id');

                $users = $request->get('user');
                $io_val = $request->get('ioval');
                $it_val = $request->get('itval');

                $admin = $request->session()->get('admin');
                $log_text = "Set item for {$id} ";
                DB::connection('mysql4')->update("INSERT INTO seal_item (ItemLimit, ItemType, OwnerID, ItemOp1, ItemOp2, OwnerDate, bxaid) VALUES('{$io_val}','{$it_val}','{$users}',0,0, CURDATE(), 'SEND')");
                $this->deleteItemAdd($id);
                DB::connection('mysql2')->insert("INSERT INTO logs (`admin_id`,`logs_detail`,`timestamp`,`ip`) VALUE ('{$admin}','{$log_text}',CURDATE(),'{$request->ip()}')");
            }
        }
        return view('admin.login');
    }

    public function postDeleteItemAdd(Request $request)
    {
        if ($request->session()->has('admin')) {
            if ($request->session()->get('role') == 0) {
                $id = $request->get('sn');
                $this->deleteItemAdd($id);
            }
        }
        return view('admin.login');
    }

    public function deleteItemAdd(string $id)
    {
        DB::connection('mysql2')->delete("DELETE FROM confirmItemAdd WHERE id = '" . $id . "'");
    }

    public function postItemsAdd(Request $request)
    {
        if ($request->session()->has('admin')) {
            if ($request->session()->get('role') >= 0) {
                $ids = $request->get('users');
                $it_val = $request->get('it');
                $io_val = $request->get('io');
                //$it_val = '3352';
                //$io_val = '300';
                //$ids = 'gm01';
                //$ids = explode(',', $ids);
                foreach ($ids as $id) {
                    $admin = $request->session()->get('admin');
                    $log_text = "Set item for {$id} ";
                    if ($request->session()->get('role') === 0) {
                        DB::connection('mysql4')->update("INSERT INTO seal_item (ItemLimit, ItemType, OwnerID, ItemOp1, ItemOp2, OwnerDate, bxaid) VALUES('{$io_val}','{$it_val}','{$id}',0,0, CURDATE(), 'SEND')");
                    } else if ($request->session()->get('role') > 0) {
                        DB::connection('mysql2')->insert("INSERT INTO confirmItemAdd (`io_val`,`it_val`,`users`) VALUE ('{$io_val}','{$it_val}','{$id}')");
                        $log_text = "Set item for {$id} need confirm";
                    }
                    DB::connection('mysql2')->insert("INSERT INTO logs (`admin_id`,`logs_detail`,`timestamp`,`ip`) VALUE ('{$admin}','{$log_text}',CURDATE(),'{$request->ip()}')");
                }
                return "success";
            }
        }
        return view('admin.login');
    }

    public function postValid(Request $request)
    {
        if ($request->session()->has('admin')) {
            if ($request->session()->get('role') >= 0) {
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

                    $admin = $request->session()->get('admin');
                    $log_text = "Set player {$a} as valid";
                    DB::connection('mysql2')->insert("INSERT INTO logs (`admin_id`,`logs_detail`,`timestamp`,`ip`) VALUE ('{$admin}','{$log_text}',CURDATE(),'{$request->ip()}')");
//                    DB::connection('mysql2')->delete("DELETE FROM users WHERE name = '" . $a . "'");
                }
            }
        }
        return view('admin.login');
    }

    public function postDelete(Request $request)
    {
        if ($request->session()->has('admin')) {
            if ($request->session()->get('role') == 0) {
                $id = $request->get('sn');
                DB::connection('mysql2')->delete("DELETE FROM idtable1 WHERE id = '" . $id . "'");
                DB::connection('mysql2')->delete("DELETE FROM users WHERE name = '" . $id . "'");

                $admin = $request->session()->get('admin');
                $log_text = "Set player {$id} as invalid";
                DB::connection('mysql2')->insert("INSERT INTO logs (`admin_id`,`logs_detail`,`timestamp`,`ip`) VALUE ('{$admin}','{$log_text}',CURDATE(),'{$request->ip()}')");
            }
        }
        return view('admin.login');
    }

    public function postDeleteEvent(Request $request)
    {
        if ($request->session()->has('admin')) {
            if ($request->session()->get('role') == 0) {
                $id = $request->get('sn');
                DB::connection('mysql2')->delete("DELETE FROM content WHERE id = '" . $id . "'");
                $admin = $request->session()->get('admin');
                $log_text = "Delete event {$id}";
                DB::connection('mysql2')->insert("INSERT INTO logs (`admin_id`,`logs_detail`,`timestamp`,`ip`) VALUE ('{$admin}','{$log_text}',CURDATE(),'{$request->ip()}')");
            }
        }
        return view('admin.login');
    }

    public function postDeleteAdmin(Request $request)
    {
        if ($request->session()->has('admin')) {
            if ($request->session()->get('role') == 0) {
                $id = $request->get('sn');
                DB::connection('mysql2')->delete("DELETE FROM admin WHERE id = '" . $id . "'");
                $admin = $request->session()->get('admin');
                $log_text = "Delete admin {$id}";
                DB::connection('mysql2')->insert("INSERT INTO logs (`admin_id`,`logs_detail`,`timestamp`,`ip`) VALUE ('{$admin}','{$log_text}',CURDATE(),'{$request->ip()}')");
            }
        }
        return view('admin.login');
    }

    public function postDeleteFanart(Request $request)
    {
        if ($request->session()->has('admin')) {
            if ($request->session()->get('role') == 0) {
                $id = $request->get('sn');
                $name = $request->get('name');
                $admin = $request->session()->get('admin');
                $log_text = "Delete fanart {$id}";
                DB::connection('mysql2')->insert("INSERT INTO logs (`admin_id`,`logs_detail`,`timestamp`,`ip`) VALUE ('{$admin}','{$log_text}',CURDATE(),'{$request->ip()}')");
                DB::connection('mysql2')->delete("DELETE FROM fanart WHERE id = '" . $id . "'");
                $destination = base_path() . '/public/picture/' . $name;
                unlink($destination);
            }
        }
        return view('admin.login');
    }

    public function postDeleteCostume(Request $request)
    {
        if ($request->session()->has('admin')) {
            if ($request->session()->get('role') == 0) {
                $id = $request->get('sn');
                $name = $request->get('name');
                $admin = $request->session()->get('admin');
                $log_text = "Delete costume {$id}";
                DB::connection('mysql2')->insert("INSERT INTO logs (`admin_id`,`logs_detail`,`timestamp`,`ip`) VALUE ('{$admin}','{$log_text}',CURDATE(),'{$request->ip()}')");
                DB::connection('mysql2')->delete("DELETE FROM costume WHERE id = '" . $id . "'");
                $destination = base_path() . '/public/picture/' . $name;
                unlink($destination);
            }
        }
        return view('admin.login');
    }

    public function postDeleteNews(Request $request)
    {
        if ($request->session()->has('admin')) {
            if ($request->session()->get('role') == 0) {
                $id = $request->get('sn');
                $name = $request->get('name');
                $admin = $request->session()->get('admin');
                $log_text = "Delete news {$id}";
                DB::connection('mysql2')->insert("INSERT INTO logs (`admin_id`,`logs_detail`,`timestamp`,`ip`) VALUE ('{$admin}','{$log_text}',CURDATE(),'{$request->ip()}')");
                DB::connection('mysql2')->delete("DELETE FROM news WHERE id = '" . $id . "'");
                $destination = base_path() . '/public/picture/' . $name;
                unlink($destination);
            }
        }
        return view('admin.login');
    }

    public function postConfirmFanart(Request $request)
    {
        if ($request->session()->has('admin')) {
            if ($request->session()->get('role') == 0) {
                $id = $request->get('sn');
                $name = $request->get('name');
                $admin = $request->session()->get('admin');
                $log_text = "Confirm fanart {$id}";
                DB::connection('mysql2')->insert("INSERT INTO logs (`admin_id`,`logs_detail`,`timestamp`,`ip`) VALUE ('{$admin}','{$log_text}',CURDATE(),'{$request->ip()}')");
                DB::connection('mysql2')->update("UPDATE fanart SET approved = '1' where id='{$id}'");
            }
        }
        return view('admin.login');
    }

    public function postConfirmCostume(Request $request)
    {
        if ($request->session()->has('admin')) {
            if ($request->session()->get('role') == 0) {
                $id = $request->get('sn');
                $name = $request->get('name');
                $admin = $request->session()->get('admin');
                $log_text = "Confirm costume {$id}";
                DB::connection('mysql2')->insert("INSERT INTO logs (`admin_id`,`logs_detail`,`timestamp`,`ip`) VALUE ('{$admin}','{$log_text}',CURDATE(),'{$request->ip()}')");
                DB::connection('mysql2')->update("UPDATE costume SET approved = '1' where id='{$id}'");
            }
        }
        return view('admin.login');
    }

    public function postConfirmNews(Request $request)
    {
        if ($request->session()->has('admin')) {
            if ($request->session()->get('role') == 0) {
                $id = $request->get('sn');
                $name = $request->get('name');
                $admin = $request->session()->get('admin');
                $log_text = "Confirm news {$id}";
                DB::connection('mysql2')->insert("INSERT INTO logs (`admin_id`,`logs_detail`,`timestamp`,`ip`) VALUE ('{$admin}','{$log_text}',CURDATE(),'{$request->ip()}')");
                DB::connection('mysql2')->update("UPDATE news SET approved = '1' where id='{$id}'");
            }
        }
        return view('admin.login');
    }

    public function postConfirmPage(Request $request)
    {
        if ($request->session()->has('admin')) {
            if ($request->session()->get('role') == 0) {
                $id = $request->get('sn');
                $name = $request->get('name');
                $admin = $request->session()->get('admin');
                $log_text = "Confirm pages {$id}";
                DB::connection('mysql2')->insert("INSERT INTO logs (`admin_id`,`logs_detail`,`timestamp`,`ip`) VALUE ('{$admin}','{$log_text}',CURDATE(),'{$request->ip()}')");
                DB::connection('mysql2')->update("UPDATE content SET approved = '1' where id='{$id}'");
            }
        }
        return view('admin.login');
    }

}
