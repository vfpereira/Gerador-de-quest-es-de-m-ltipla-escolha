<?php


namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    //Controller para chamar a view de dashboard
    public function index(){

    	return view('system.dashboard');

    }

}