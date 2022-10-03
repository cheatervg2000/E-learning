<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;
    protected $fillable = [
        'content',
        'type',
        'status',
        'phone',
        'answer_correct',
    ];
    public function answers()
    {
        return $this->hasMany(Answer::class, 'question_id', 'id');
    }
    
    public function tests(){
        return $this->belongsToMany(Tests::class, "question_test",'question_id', 'test_id');
    }
}
