<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

use App\Config;


class ConfigTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('configs')->delete();
        Config::Create([
            'id'        =>1,
        	'freq'		=>-1,
        ]);
    }

}
