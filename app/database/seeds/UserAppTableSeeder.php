<?php

use Illuminate\Database\Seeder;
use App\UserApp;

class UserAppTableSeeder extends Seeder
{
	//cria dados de login para teste

	public function run()
	{
	    DB::table('user_apps')->delete();

	    UserApp::create(array(
	        'email'    => 'teste@teste.com',
	        'password' => Hash::make('teste'),
	    ));
	}

}