<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use App\Models\Teacher;
use App\Models\Matching;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class MatchingController extends Controller
{
    public function index (Request $request): View
    {
        // 検索に合致する先生を取得
        $search = new Matching();
        $search_teachers = $search->search_teachers($request);

        // 先生を生徒の科目に最も適する順に並べ替え (Teacherモデルの配列が返り値)
        $recommend_teachers = Auth::user()->orderby_recommend_teachers();
        // 先生が担当する科目の中で、生徒の希望科目に該当する科目を取得 (該当科目の配列の連想配列 ([teacher_id => [subjects]]) が返り値)
        $teacher_applicable_subjects = [];
        foreach ($recommend_teachers as $recommend_teacher) {
            $teacher_applicable_subjects[$recommend_teacher->id] = $recommend_teacher->applicable_user_subjects(Auth::user());
        }

        // 先生をランダムに10件取得
        $teachers_10 = Teacher::inRandomOrder()->take(10)->get();

        return view('matchings.index')
            ->with([
                'subjects' => Subject::all(), // 先生検索の科目絞り込み用
                'search_teachers' => $search_teachers, // 検索の先生
                'recommend_teachers' => $recommend_teachers, // 推奨する先生
                'teacher_applicable_subjects' => $teacher_applicable_subjects, // 推奨する講師の指導科目の中で、生徒の希望科目と一致しているもの
                'teachers_10' => $teachers_10, // ランダムに取得した先生10件
            ]);
    }
}
