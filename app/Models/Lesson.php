<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;

class Lesson extends Model
{
    use HasFactory, Notifiable;

    protected $appends = [
        'is_test_completed', 'test_point'
    ];

    protected $fillable = [
        'id',
        'chapter_id',
        'name',
        'content',
        'status',
        'created_at',
        'updated_at',
        'path_video',
        'public',
    ];
    protected $primaryKey = 'id';
    public $incrementing = false;

    protected function isTestCompleted(): Attribute
    {
        return new Attribute(
            get: function () {
                $user = Auth::user();
                $lessonId = $this->id;
                if ($user) {
                    $quizTest = QuizTest::where('user_id', $user->id)->whereHas('quiz', function ($query) use ($lessonId) {
                        $query->where('lesson_id', $lessonId);
                    })->first();
                    return !empty($quizTest);
                }
                return false;
            },
        );
    }

    protected function testPoint(): Attribute
    {
        return new Attribute(
            get: function () {
                $user = Auth::user();
                $lessonId = $this->id;
                if ($user) {
                    $quizTests = QuizTest::where('user_id', $user->id)->whereHas('quiz', function ($query) use ($lessonId) {
                        $query->where('lesson_id', $lessonId);
                    })->count();
                    if ($quizTests > 0) {
                        $quizTestsIsCorrect = QuizTest::where('user_id', $user->id)->whereHas('quiz', function ($query) use ($lessonId) {
                            $query->where('lesson_id', $lessonId);
                        })->where('is_correct', 1)->count();
                        return round($quizTestsIsCorrect / $quizTests, 2) * 10;
                    }
                }
                return 0;
            },
        );
    }
}
