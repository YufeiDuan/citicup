<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Mail;
use App\Team;

class MailTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('mails')->delete();

        Mail::Create([
        	'from_id'	=>1,
        	'to_id'		=>2,
        	'subject'	=>'比赛通知1',
        	'content'	=>'重要通知1234353亲43差价零身份扥a扥啊aer让他出auf哦',
        	'flag_read'	=>true,
            'del_s'     =>false,
            'del_r'     =>false,
            'uid'       =>str_random(10),
        ]);

        Mail::Create([
        	'from_id'	=>1,
        	'to_id'		=>2,
        	'subject'	=>'比赛通知2',
        	'content'	=>'重要通知1234353亲43差价零身份扥a扥啊aer让他出auf哦',
        	'flag_read'	=>false,
            'del_s'     =>false,
            'del_r'     =>false,
            'uid'       =>str_random(10),
        ]);

    }

}
