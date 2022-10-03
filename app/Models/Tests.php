<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tests extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'total_question',
        'status',
    ];

    public function questions(){
        return $this->belongsToMany(Question::class, "question_test",'test_id', 'question_id');
    }
    public function courses(){
        return $this->belongsToMany(Course::class, "course_test",'test_id', 'course_id');
    }
}
