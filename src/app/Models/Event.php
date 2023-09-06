<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'teacher_id',
        'date_time',
        'type',
        'content',
    ];

    public function feedback(){
        return $this->hasOne(Feedback::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function teacher(){
        return $this->belongsTo(Teacher::class);
    }
}
