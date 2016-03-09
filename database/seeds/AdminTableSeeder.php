<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Team;
use App\Member;
use App\Teacher;
use App\Admin;


class AdminTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->delete();
        Admin::Create([
            'id'        =>1,
        	'name'		=>'chengyx',
        	'password'	=>password_hash('xing68@rj', PASSWORD_BCRYPT),
        	'state'		=>1,
        ]);


    }

}
