<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    protected $table = 'quizs';
    use HasFactory;

    protected $fillable = [
        'id',
        'chapter_id',
        'lesson_id',
        'question_id',
        'created_at',
        'updated_at'
    ];

    public function chapter()
    {
        return $this->belongsTo(Chapter::class);
    }

    public function lesson()
    {
        return $this->belongsTo(Lesson::class);
    }

    public function question()
    {
        return $this->belongsTo(Question::class);
    }
}
