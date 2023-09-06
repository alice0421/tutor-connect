<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 外国語
        DB::table('subjects')->insert([
            'name' => '英語',
        ]);

        // 国語
        DB::table('subjects')->insert([
            'name' => '国語',
        ]);

        // 地歴・公民
        DB::table('subjects')->insert([
            'name' => '日本史',
        ]);
        DB::table('subjects')->insert([
            'name' => '世界史',
        ]);
        DB::table('subjects')->insert([
            'name' => '地理',
        ]);
        DB::table('subjects')->insert([
            'name' => '現代社会',
        ]);
        DB::table('subjects')->insert([
            'name' => '倫理',
        ]);
        DB::table('subjects')->insert([
            'name' => '政治・経済',
        ]);
        DB::table('subjects')->insert([
            'name' => '倫理・政経',
        ]);

        // 数学
        DB::table('subjects')->insert([
            'name' => '数学ⅠA',
        ]);
        DB::table('subjects')->insert([
            'name' => '数学ⅡB',
        ]);
        
        // 理科
        DB::table('subjects')->insert([
            'name' => '物理基礎',
        ]);
        DB::table('subjects')->insert([
            'name' => '化学基礎',
        ]);
        DB::table('subjects')->insert([
            'name' => '生物基礎',
        ]);
        DB::table('subjects')->insert([
            'name' => '地学基礎',
        ]);
        DB::table('subjects')->insert([
            'name' => '物理',
        ]);
        DB::table('subjects')->insert([
            'name' => '化学',
        ]);
        DB::table('subjects')->insert([
            'name' => '生物',
        ]);
        DB::table('subjects')->insert([
            'name' => '地学',
        ]);
    }
}
