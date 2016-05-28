<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

use App\Type;


class TypeTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('types')->delete();
        Type::Create([
            'id'        =>1,
        	'name'		=>'商业计划书',
            'team_id'   =>1,
        ]);
        Type::Create([
            'id'        =>2,
            'name'      =>'技术文档',
            'team_id'   =>1,
        ]);
        Type::Create([
            'id'        =>3,
            'name'      =>'需求文档',
            'team_id'   =>1,
        ]);
        Type::Create([
            'id'        =>4,
            'name'      =>'测试文档',
            'team_id'   =>1,
        ]);
        Type::Create([
            'id'        =>5,
            'name'      =>'用户手册',
            'team_id'   =>1,
        ]);
        Type::Create([
            'id'        =>6,
            'name'      =>'源代码',
            'team_id'   =>1,
        ]);
        Type::Create([
            'id'        =>7,
            'name'      =>'项目花絮',
            'team_id'   =>1,
        ]);
        Type::Create([
            'id'        =>8,
            'name'      =>'参赛承诺书',
            'team_id'   =>1,
        ]);
    }

}
