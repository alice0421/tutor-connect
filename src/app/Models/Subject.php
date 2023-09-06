<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public $timestamps = false;

    public function students(){
        return $this->belongsToMany(Student::class);
    }

    public function teachers(){
        return $this->belongsToMany(Teacher::class);
    }
}
