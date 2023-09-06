<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class TeacherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 理系の先生
        DB::table('teachers')->insert([
            'first_name' => '洋平',
            'family_name' => '鈴木',
            'email' => 'yohei.suzuki@gmail.com',
            'gender' => 0, // 男
            'affiliation' => '早稲田大学',
            'grade' => 2, // 大学3年生
            'teaching_history' => 3,
            'achievement' => '偏差値40から偏差値60まで半年で上げた実績があります。',
            'introduction' => '自身が大学受験で苦労した経験をもとに、わかりやすい授業を心がけます。',
            'password' => Hash::make('password'),
        ]);
        
        // 文系の先生
        DB::table('teachers')->insert([
            'first_name' => '真里',
            'family_name' => '佐藤',
            'email' => 'mari.sato@gmail.com',
            'gender' => 1, // 女
            'affiliation' => '東京大学',
            'grade' => 4, // 修士1年生
            'teaching_history' => 5,
            'achievement' => '何人もの学生を東京大学に合格させました。',
            'introduction' => '現役東大学生が、東大合格まで導きます。',
            'password' => Hash::make('password'),
        ]);

        // 国語 + 日本史のみ教えられる先生
        DB::table('teachers')->insert([
            'first_name' => '大介',
            'family_name' => '小林',
            'email' => 'daisuke.kobayashi@gmail.com',
            'gender' => 0, // 男
            'affiliation' => '青山大学',
            'grade' => 0, // 大学1年生
            'teaching_history' => 0,
            'introduction' => '初めての家庭教師ですが、共に頑張っていきましょう！',
            'password' => Hash::make('password'),
        ]);

        // 世界史 + 現代社会 + 政治・経済のみ教えられる先生 (最低限の記述)
        DB::table('teachers')->insert([
            'first_name' => '和音',
            'family_name' => '大森',
            'email' => 'kazune.omori@gmail.com',
            'gender' => 1, // 女
            'affiliation' => '東京大学',
            'grade' => 2, // 大学3年生
            'password' => Hash::make('password'),
        ]);

        // 理科基礎 + 物理　+ 化学のみ教えられる先生
        DB::table('teachers')->insert([
            'first_name' => '隼人',
            'family_name' => '高橋',
            'email' => 'hayato.takahashi@gmail.com',
            'gender' => 0, // 男
            'affiliation' => '明治大学',
            'grade' => 1, // 大学2年生
            'teaching_history' => 4,
            'achievement' => '弟のテスト勉強をサポートし、赤点を回避させていました。',
            'introduction' => '弟に勉強を教えていた経験を活かして、皆さんをサポートしたいと思っています。',
            'password' => Hash::make('password'),
        ]);

        // 数学のみ教えられる先生
        DB::table('teachers')->insert([
            'first_name' => '絢',
            'family_name' => '金原',
            'email' => 'aya.kanahara@gmail.com',
            'gender' => 1, // 女
            'affiliation' => '早稲田大学',
            'grade' => 2, // 大学3年生
            'teaching_history' => 5,
            'achievement' => '数多くの中学、高校生の学業をサポートし、成績上位者に押し上げてきました。',
            'introduction' => 'なぜ分からないのかを根底から洗い出し、底力をつけさせて学力を上げることを目標としています。',
            'password' => Hash::make('password'),
        ]);
    }
}
