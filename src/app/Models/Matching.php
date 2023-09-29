<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Matching extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'teacher_id',
        'is_accepted',
        'comment',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function teacher(){
        return $this->belongsTo(Teacher::class);
    }

    public function search_teachers (Request $request): array
    {
        $keyword = $request->only('name', 'subjects');
        $result_names = [];
        $result_subjects = [];
        $search_teachers = [];

        // 名前での検索（部分一致検索）
        if (!empty($keyword['name'])) {
            if (Teacher::where('first_name', 'LIKE', "%{$keyword['name']}%")->exists()) {
                $teachers = Teacher::where('first_name', 'LIKE', "%{$keyword['name']}%")->get();
                foreach ($teachers as $teacher) {
                    $result_names[$teacher->id] = $teacher;
                }
            } elseif (Teacher::where('family_name', 'LIKE', "%{$keyword['name']}%")->exists()) {
                $teachers = Teacher::where('family_name', 'LIKE', "%{$keyword['name']}%")->get();
                foreach ($teachers as $teacher) {
                    $result_names[$teacher->id] = $teacher;
                }
            } elseif (Teacher::where(DB::raw('CONCAT(family_name, first_name)'), 'LIKE', "%{$keyword['name']}%")->exists()) {
                // 姓と名を結合して検索
                $teachers = Teacher::where(DB::raw('CONCAT(family_name, first_name)'), 'LIKE', "%{$keyword['name']}%")->get();
                foreach ($teachers as $teacher) {
                    $result_names[$teacher->id] = $teacher;
                }
            }
        }

        // 教科での検索 (AND検索)
        if (!empty($keyword['subjects'])) {
            $teachers = $result_names;
            // 検索欄が空のときは、$teachers->all()で検索
            if (empty($result_names)) {
                $teachers = Teacher::all();
            }
            foreach ($teachers as $teacher) {
                $is_searched = true; 
                foreach ($keyword['subjects'] as $subject_id) {
                    // 1つでも当てはまらない科目があれば除外
                    if($teacher->subjects()->where('subject_id', $subject_id)->exists() === false) {
                        $is_searched = false;
                        break;
                    }
                }
                if ($is_searched) $result_subjects[$teacher->id] = $teacher;
            }
        }

        // ANDで検索結果を統合
        if(empty($keyword['name'])) {
            return $result_subjects;
        } elseif (empty($keyword['subjects'])) {
            return $result_names;
        } else {
            foreach ($result_names as $teacher) {
                if (in_array($teacher, $result_subjects)) {
                    $search_teachers[$teacher->id] = $teacher;
                }
            }
            return $search_teachers;
        }
    }
}
