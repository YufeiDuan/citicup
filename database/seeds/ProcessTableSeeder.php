<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

use App\Process;


class ProcessTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('processes')->delete();
        Process::Create([
            'id'        =>1,
        	'type'		=>1,
        	'time'	    =>'2016-07-15 00:00:00',
        ]);
        Process::Create([
            'id'        =>2,
            'type'      =>2,
            'time'      =>'2016-08-12 00:00:00',
        ]);
        Process::Create([
            'id'        =>3,
            'type'      =>3,
            'time'      =>'2016-09-16 00:00:00',
        ]);
    }

}
