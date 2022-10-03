<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Course extends Model
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'id',
        'name',
        'video',
        'description',
        'requirements',
        'outcomes',
        'des_image',
        'start_date',
        'end_date',
        'status',
        'created_at',
        'update_at',

    ];
    protected $primaryKey = 'id';
    public $incrementing = false;

    public function students() {
        return $this->belongsToMany(User::class, "course_user","course_id", "user_id");
    }
    public function classrooms() {
        return $this->belongsToMany(Classroom::class, "classroom_course","course_id", "classroom_id");
    }
    public function tests(){
        return $this->belongsToMany(Tests::class, "course_test",'course_id', 'test_id');
    }
}
