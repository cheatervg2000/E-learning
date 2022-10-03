<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    use HasFactory;


    protected $fillable = [
        'id',
        'email',
        'course_id',
        'chapter',
        'content',

    ];
    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id', 'id');
    }

    public function chapter()
    {
        return $this->belongsTo(Lesson::class, 'chapter', 'id');
    }
}
