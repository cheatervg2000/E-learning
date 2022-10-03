<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classroom extends Model
{
    use HasFactory;

    protected $fillable =
    [
        'id',
        'name',
        'description',
        'total_student',
        'status',
    ];

    public function students() {
        return $this->belongsToMany(User::class, "user_classroom","classroom_id", "user_id");
    }
    public function courses() {
        return $this->belongsToMany(Course::class, "classroom_course","classroom_id", "course_id");
    }
}
