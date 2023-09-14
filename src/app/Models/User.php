<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
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
        'name',
        'nickname',
        'is_name_public',
        'email',
        'gender',
        'grade',
        'preferred_daily_class',
        'preferred_weekly_day',
        'goal',
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
}
