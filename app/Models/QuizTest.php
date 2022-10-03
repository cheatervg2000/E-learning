<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuizTest extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'quiz_id',
        'user_id',
        'answer',
        'answer_correct',
        'is_correct',
        'created_at',
        'updated_at'
    ];

    public function quiz()
    {
        return $this->belongsTo(Quiz::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
