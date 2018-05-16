<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\sspClass;

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

    public function registerDataTable() {
        $table = 'idtable1';
        $primaryKey = 'idtable1`.`id';
        $columns = array(
            array('db' => 'id', 'dt' => 0),
            array(
                'db' => 'nick_name',
                'dt' => 1
            ),
            array(
                'db' => 'email',
                'dt' => 2
            ),
            array('db' => 'id', 'dt' => 3, 'formatter' => function( $d, $row ) {
                    $return = '<button title="Set to available" type="button" data-internal="' . $d . '" onclick="pushValid(this)"
                                             class="btn btn-pure-xs btn-xs btn-delete">
                                        <span class="glyphicon glyphicon-save"></span>
                                    </button>';
                    return $return;
                })
        );

        $sql_details = array(
            'user' => 'root',
            'pass' => 'jb9fwDJs',
            'db' => 'seal_data',
            'host' => 'localhost'
        );

//        require(app_path().'\ssp.class.php');
//        $ID_CLIENT_VALUE = Auth::user()->CompanyInternalID;
        $extraCondition = "";
        $join = '';
        echo json_encode(
                SSP::simple($_GET, $sql_details, $table, $primaryKey, $columns, $extraCondition, $join));
    }

}
