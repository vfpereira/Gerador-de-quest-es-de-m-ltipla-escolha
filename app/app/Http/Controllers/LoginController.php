<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    //Controller para chamar a view de login
    public function index(){

    	return view('user.login');

    }

	/**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function formSubmit(Request $request)
    {
    	//verificar se usuario e o mesmo no banco
    }

    public function formSubmitRegister(Request $request)
    {
    	//verificar se usuario e o mesmo no banco
    }



}
