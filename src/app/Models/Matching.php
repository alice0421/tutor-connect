<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
