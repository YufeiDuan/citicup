<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Team;
use App\Member;
use App\Teacher;



class AuthenTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('teachers')->delete();
        DB::table('members')->delete();
        DB::table('teams')->delete();
        DB::table('authens')->delete();
        User::Create([
            'id'        =>1,
        	'email'		=>'xminor@163.com',
        	'password'	=>password_hash('123456', PASSWORD_BCRYPT),
        	'state'		=>1,
        ]);

        Team::Create([
            'id'        =>1,
            'name'      =>'举办方',
            'univ_id'   =>2135,
            'title'     =>'CitiCup',
            'logo'      =>'1.jpg',
        ]);

        Team::Create([
            'id'        =>2,
            'name'      =>'张三lisi王5',
            'univ_id'   =>2135,
            'title'     =>'红鲤鱼与绿鲤鱼',
            'logo'      =>'1.jpg',
            'authen_id'   =>1,
        ]);

        Member::Create([
            'name'      =>'张三',
            'sex'       =>true,
            'univ_id'   =>2135,
            'college'   =>'软件学院',
            'major'     =>'软件工程',
            'stu_num'   =>'3115370001',
            'id_num'    =>'410101199308112017',
            'degree'    =>'2',
            'year_entry'=>2015,
            'email'     =>'xminor@163.com',
            'team_id'   =>2,
            'leader'    =>true,
        ]);

        Member::Create([
            'name'      =>'特洛夫斯基',
            'sex'       =>false,
            'univ_id'   =>2135,
            'college'   =>'软件学院',
            'major'     =>'软件工程',
            'stu_num'   =>'3115370002',
            'id_num'    =>'610113199301251615',
            'degree'    =>'2',
            'year_entry'=>2015,
            'email'     =>'xminor2@163.com',
            'team_id'   =>2,
            'leader'    =>false,
        ]);


        Teacher::Create([
            'name'      =>'张老师',
            'univ_id'   =>2135,
            'college'   =>'软件学院',
            'email'     =>'zhang@mail.xjtu.edu.cn',
            'team_id'   =>2,
        ]);
    }

}
