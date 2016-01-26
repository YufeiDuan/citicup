<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Area;

class AreaTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('areas')->delete();
  
        Area::create(['id'=>11,'name'=>'北京']);
	Area::create(['id'=>12,'name'=>'天津']);
	Area::create(['id'=>13,'name'=>'河北']);
	Area::create(['id'=>14,'name'=>'山西']);
	Area::create(['id'=>15,'name'=>'内蒙古']);
	Area::create(['id'=>21,'name'=>'辽宁']);
	Area::create(['id'=>22,'name'=>'吉林']);
	Area::create(['id'=>23,'name'=>'黑龙江']);
	Area::create(['id'=>31,'name'=>'上海']);
	Area::create(['id'=>32,'name'=>'江苏']);
	Area::create(['id'=>33,'name'=>'浙江']);
	Area::create(['id'=>34,'name'=>'安徽']);
	Area::create(['id'=>35,'name'=>'福建']);
	Area::create(['id'=>36,'name'=>'江西']);
	Area::create(['id'=>37,'name'=>'山东']);
	Area::create(['id'=>41,'name'=>'河南']);
	Area::create(['id'=>42,'name'=>'湖北']);
	Area::create(['id'=>43,'name'=>'湖南']);
	Area::create(['id'=>44,'name'=>'广东']);
	Area::create(['id'=>45,'name'=>'广西']);
	Area::create(['id'=>46,'name'=>'海南']);
	Area::create(['id'=>50,'name'=>'重庆']);
	Area::create(['id'=>51,'name'=>'四川']);
	Area::create(['id'=>52,'name'=>'贵州']);
	Area::create(['id'=>53,'name'=>'云南']);
	Area::create(['id'=>54,'name'=>'西藏']);
	Area::create(['id'=>61,'name'=>'陕西']);
	Area::create(['id'=>62,'name'=>'甘肃']);
	Area::create(['id'=>63,'name'=>'青海']);
	Area::create(['id'=>64,'name'=>'宁夏']);
	Area::create(['id'=>65,'name'=>'新疆']);
	Area::create(['id'=>70,'name'=>'香港']);
	Area::create(['id'=>71,'name'=>'澳门']);
	Area::create(['id'=>72,'name'=>'台湾']);

    }

}
