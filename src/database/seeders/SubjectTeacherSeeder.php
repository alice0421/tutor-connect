<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubjectTeacherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 鈴木洋平先生 (理系) の指導可能科目
        DB::table('subject_teacher')->insert([
            'subject_id' => 1, // 英語
            'teacher_id' => 1,
        ]);
        for ($i = 10; $i <= 19; $i++) {
            DB::table('subject_teacher')->insert([
                'subject_id' => $i, // 理系科目全て
                'teacher_id' => 1,
            ]);
        }

        // 佐藤真里先生 (文系) の指導可能科目
        for ($i = 1; $i <= 9; $i++) {
            DB::table('subject_teacher')->insert([
                'subject_id' => $i, // 英語 + 文系科目全て
                'teacher_id' => 2,
            ]);
        }

        // 小林大介先生 (国語 + 日本史のみ) の指導可能科目
        DB::table('subject_teacher')->insert([
            'subject_id' => 2, // 国語
            'teacher_id' => 3,
        ]);
        DB::table('subject_teacher')->insert([
            'subject_id' => 3, // 日本史
            'teacher_id' => 3,
        ]);

        // 大森和音先生 (世界史 + 現代社会 + 政治・経済のみ) の指導可能科目
        DB::table('subject_teacher')->insert([
            'subject_id' => 4, // 世界史
            'teacher_id' => 4,
        ]);
        DB::table('subject_teacher')->insert([
            'subject_id' => 6, // 現代社会
            'teacher_id' => 4,
        ]);
        DB::table('subject_teacher')->insert([
            'subject_id' => 8, // 政治・経済
            'teacher_id' => 4,
        ]);

        // 高橋隼人先生 (理科基礎 + 物理 + 化学のみ) の指導可能科目
        for ($i = 12; $i <= 17; $i++) {
            DB::table('subject_teacher')->insert([
                'subject_id' => $i, // 理科基礎 + 物理 + 化学
                'teacher_id' => 5,
            ]);
        }

        // 金原絢先生 (数学のみ) の指導可能科目
        DB::table('subject_teacher')->insert([
            'subject_id' => 10, // 数学ⅠA
            'teacher_id' => 6,
        ]);
        DB::table('subject_teacher')->insert([
            'subject_id' => 11, // 数学ⅡB
            'teacher_id' => 6,
        ]);

        // 坂本大智先生 (全教科) の指導可能科目
        for ($i = 1; $i <= 19; $i++) {
            DB::table('subject_teacher')->insert([
                'subject_id' => $i, // 全教科
                'teacher_id' => 7,
            ]);
        }
    }
}
