<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Chapter extends Model
{
    use  HasFactory, Notifiable;

    protected $fillable = [
        'id',
        'course_id',
        'name',
        'status',
        'created_at',
        'update_at',

    ];
    protected $primaryKey = 'id';
    public $incrementing = false;
}
