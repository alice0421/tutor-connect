<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Teacher extends Authenticatable
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
        'email',
        'gender',
        'affiliation',
        'grade',
        'teaching_history',
        'achievement',
        'introduction',
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

    public function users(){
        return $this->belongsToMany(User::class);
    }

    public function subjects(){
        return $this->belongsToMany(Subject::class);
    }

    // 先生が担当する科目の中で、生徒の希望科目に該当する科目を取得。
    public function applicable_user_subjects (User $user): array
    {
        $teacher_applicable_subjects = [];
        foreach ($user->subjects()->get() as $subject) {
            foreach ($this->subjects()->get() as $teacher_subject) {
                if ($teacher_subject->id === $subject->id) {
                    $teacher_applicable_subjects[] = $subject;
                }
            }
        }
        
        return $teacher_applicable_subjects;
    }
}
