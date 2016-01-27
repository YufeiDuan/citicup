<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\User;

class AuthenTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('authens')->delete();
  
        User::Create([
        	'email'		=>'xminor@163.com',
        	'password'	=>password_hash('123456', PASSWORD_BCRYPT),
        	'state'		=>1
        ]);
    }

}
