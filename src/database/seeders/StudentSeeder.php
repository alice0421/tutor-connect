<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 必要最低限の記入
        DB::table('students')->insert([
            'name' => '加藤浩一',
            'email' => 'taro.yamada@gmail.com',
            'gender' => 0, // 男
            'grade' => 2, // 中学3年生
            'password' => Hash::make('password'),
        ]);

        // 必要最低限+αの記入
        DB::table('students')->insert([
            'name' => '佐々木駿介',
            'email' => 'jiro.yamada@gmail.com',
            'gender' => 0, // 男
            'grade' => 0, // 中学1年生
            'preferred_daily_class' => 2, // 2コマ/日
            'preferred_weekly_day' => 3, // 3日/週
            'password' => Hash::make('password'),
        ]);

        // フル記入
        DB::table('students')->insert([
            'name' => '山岸萌香',
            'nickname' => 'Moe',
            'is_name_public' => 1,
            'email' => 'hanako.yamada@gmail.com',
            'gender' => 1, // 女
            'grade' => 4, // 高校2年生
            'preferred_daily_class' => 5, // 5コマ/日
            'preferred_weekly_day' => 4, // 4日/週
            'goal' => 1, // 受験
            'password' => Hash::make('password'),
        ]);
    }
}
