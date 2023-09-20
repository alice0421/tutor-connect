<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class MatchingController extends Controller
{
    public function index (): View
    {
        // 先生を生徒の科目に最も適する順に並べ替え (Teacherモデルの配列が返り値)
        $recommend_teachers = Auth::user()->orderby_recommend_teachers();
        // 先生が担当する科目の中で、生徒の希望科目に該当する科目を取得 (該当科目の配列の連想配列 ([teacher_id => [subjects]]) が返り値)
        $teacher_applicable_subjects = [];
        foreach ($recommend_teachers as $recommend_teacher) {
            $teacher_applicable_subjects[$recommend_teacher->id] = $recommend_teacher->applicable_user_subjects(Auth::user());
        }

        // 先生をランダムに10件取得
        $teachers = Teacher::inRandomOrder()->take(6)->get();

        return view('matchings.index')
            ->with([
                'recommend_teachers' => $recommend_teachers,
                'teacher_applicable_subjects' => $teacher_applicable_subjects,
                'teachers' => $teachers,
            ]);
    }
}
