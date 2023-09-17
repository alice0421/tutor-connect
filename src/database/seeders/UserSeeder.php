<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 必要最低限の記入
        DB::table('users')->insert([
            'first_name' => '浩一',
            'family_name' => '加藤',
            'email' => 'taro.yamada@gmail.com',
            'gender' => 0, // 男
            'grade' => 2, // 中学3年生
            'password' => Hash::make('password'),
        ]);

        // 必要最低限+αの記入
        DB::table('users')->insert([
            'first_name' => '駿介',
            'family_name' => '佐々木',
            'email' => 'jiro.yamada@gmail.com',
            'gender' => 0, // 男
            'grade' => 0, // 中学1年生
            'preferred_class_per_day' => 2, // 2コマ/日
            'preferred_studying_day_per_week' => 3, // 3日/週
            'password' => Hash::make('password'),
        ]);

        // フル記入
        DB::table('users')->insert([
            'first_name' => '萌香',
            'family_name' => '山岸',
            'nickname' => 'Moe',
            'is_name_public' => 1,
            'email' => 'hanako.yamada@gmail.com',
            'gender' => 1, // 女
            'grade' => 4, // 高校2年生
            'preferred_class_per_day' => 5, // 5コマ/日
            'preferred_studying_day_per_week' => 4, // 4日/週
            'purpose' => 2, // 大学受験
            'password' => Hash::make('password'),
        ]);
    }
}
