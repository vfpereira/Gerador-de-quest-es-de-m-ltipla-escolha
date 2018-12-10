<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Hash;
use Auth;

class LoginController extends Controller
{
    //Controller para chamar a view de login
    public function index(){

    	return view('user.login');

    }

	//Verifica se usuario existe e loga o usuario ou falso se nao existir 
    public function formSubmit(Request $request)
    {
    	$email = $request->input('email');
    	$password = $request->input('password');

    	$user = User::where([
								['email', '=', $email]
							])->first();
    	
    	$success = $this->checkPassword($user, $password);

    	if ($success){
    		if (Auth::attempt(['email' => $email, 'password' => $password]))
        	{
        		$data['login'] = true;
        		$data['url'] =redirect()->intended('admin')->getTargetUrl(); 
            	return $data;
        	}
    	}else{
    		$data['login'] = false;
    		return $data;
    	}
    }


    //cadastra novo usuario no banco no caso dele nao existir
    public function formSubmitRegister(Request $request)
    {
    	$email = $request->input('email');
    	$password = $request->input('password');

    	$user = User::where([
								['email', '=', $email]
							])->first();

    	if ($user){
    		$data['register'] = false;

    		return $data;

    	}else{
    		$user = new User;
	        $user->email = $email;
	        $user->password = Hash::make($password);
	        $user->save();
			$data['register'] = true;
	        
	        return $data; 

    	}

    }

    //verifica se a senha e valida
    private function checkPassword($user, $password)
    {
    	if ($user && Hash::check($password, $user->password)){
    		return true;
    	}else{
    		return false;
    	}
    }

    public function logout() {
		
		Auth::logout();
		return redirect()->intended('/');
	
	}



}

