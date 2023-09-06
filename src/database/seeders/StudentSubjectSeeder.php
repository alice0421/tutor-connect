<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StudentSubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 加藤浩一 (英語 + 数学)
        DB::table('student_subject')->insert([
            'student_id' => 1,
            'subject_id' => 1, // 英語
        ]);
        DB::table('student_subject')->insert([
            'student_id' => 1,
            'subject_id' => 10, // 数学ⅠA
        ]);
        DB::table('student_subject')->insert([
            'student_id' => 1,
            'subject_id' => 11, // 数学ⅡB
        ]);

        // 佐々木駿介 (数学 + 物理)
        DB::table('student_subject')->insert([
            'student_id' => 2,
            'subject_id' => 10, // 数学ⅠA
        ]);
        DB::table('student_subject')->insert([
            'student_id' => 2,
            'subject_id' => 11, // 数学ⅡB
        ]);
        DB::table('student_subject')->insert([
            'student_id' => 2,
            'subject_id' => 16, // 物理
        ]);

        // 山岸萌香 (英語 + 国語 + 日本史 + 現代社会 + 政治・経済)
        DB::table('student_subject')->insert([
            'student_id' => 3,
            'subject_id' => 1, // 英語
        ]);
        DB::table('student_subject')->insert([
            'student_id' => 3,
            'subject_id' => 2, // 国語
        ]);
        DB::table('student_subject')->insert([
            'student_id' => 3,
            'subject_id' => 3, // 日本史
        ]);
        DB::table('student_subject')->insert([
            'student_id' => 3,
            'subject_id' => 6, // 現代社会
        ]);
        DB::table('student_subject')->insert([
            'student_id' => 3,
            'subject_id' => 8, // 政治・経済
        ]);
    }
}
