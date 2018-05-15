<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	$username = INPUT::get('email');
	$username = INPUT::get('email');
}
        return view('home');
    }
}
