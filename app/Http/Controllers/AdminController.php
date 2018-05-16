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

    public function registerDataTable() {
        $table = 'm_uncatagorized';
        $primaryKey = 'm_uncatagorized`.`SerialNumber';
        $columns = array(
            array('db' => 'SerialNumber', 'dt' => 0),
            array(
                'db' => 'MSISDN',
                'dt' => 1
            ),
            array(
                'db' => 'Remark',
                'dt' => 2
            ),
            array('db' => 'SerialNumber', 'dt' => 3, 'formatter' => function( $d, $row ) {
                    $set_msisdn = '';
                    $MSISDN = DB::table('m_uncatagorized')
                                    ->where('SerialNumber', $d)->select('MSISDN')->get();
                    if ($MSISDN[0]->MSISDN != NULL)
                        $set_msisdn = $MSISDN[0]->MSISDN;
                    $return = '<button title="Set to available" type="button" data-internal="' . $d . '" data-msisdn="' . $set_msisdn . '"  onclick="goShipin(this)"
                                             class="btn btn-pure-xs btn-xs btn-delete">
                                        <span class="glyphicon glyphicon-save"></span>
                                    </button>';
                    $return .= '<button title="Edit remark" type="button" data-internal="' . $d . '"  onclick="editRemark(this)"
                                             class="btn btn-pure-xs btn-xs btn-delete">
                                        <span class="glyphicon glyphicon-pencil"></span>
                                    </button>';
                    return $return;
                })
        );

        $sql_details = array(
            'user' => 'root',
            'pass' => '',
            'db' => 'telkom2',
            'host' => 'localhost'
        );

        require('ssp.class.php');
//        $ID_CLIENT_VALUE = Auth::user()->CompanyInternalID;
        $extraCondition = "";
        $join = '';
        echo json_encode(
                SSP::simple($_GET, $sql_details, $table, $primaryKey, $columns, $extraCondition, $join));
    }

}
