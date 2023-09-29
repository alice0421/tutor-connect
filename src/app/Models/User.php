<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'family_name',
        'nickname',
        'is_name_public',
        'email',
        'gender',
        'grade',
        'preferred_class_per_day',
        'preferred_studying_day_per_week',
        'purpose',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function feedback(){
        return $this->hasMany(Feedback::class);
    }

    public function matchings(){
        return $this->hasMany(Matching::class);
    }

    public function messages(){
        return $this->hasMany(Message::class);
    }

    public function records(){
        return $this->hasMany(Record::class);
    }

    public function reviews(){
        return $this->hasMany(Review::class);
    }

    public function subjects(){
        return $this->belongsToMany(Subject::class);
    }

    public function teachers(){
        return $this->belongsToMany(Teacher::class);
    }

    // 先生を生徒の科目に最も適する順に並べ替え
    public function orderby_recommend_teachers (): array
    {
        // 生徒の希望科目を全取得
        $subjects = $this->subjects()->get();
        // 各先生に対して当てはまる科目数をカウント ([teacher_id => count]の形で保存)
        $teacher_count = [];
        foreach ($subjects as $subject) {
            $teachers = $subject->teachers()->get();
            foreach ($teachers as $teacher) {
                if (array_key_exists($teacher->id, $teacher_count)) {
                    $teacher_count[$teacher->id]++;
                } else {
                    $teacher_count[$teacher->id] = 1;
                }
            }
        }
        // 該当する科目数が多い先生順に並び替え
        arsort($teacher_count);
        $teacher_ids = array_keys($teacher_count);
        // 上位3人の先生を取得
        $teachers = [];
        for ($i = 0; $i < 3; $i++) {
            $teachers[$teacher_ids[$i]] = Teacher::find($teacher_ids[$i]);
        }

        return $teachers;
    }
}
