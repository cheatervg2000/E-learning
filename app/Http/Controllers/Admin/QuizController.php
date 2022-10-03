<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Answer;
use App\Models\Lesson;
use App\Models\Question;
use App\Models\Quiz;
use App\Models\QuizTest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuizController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($lessonId)
    {
        $lesson = Lesson::find($lessonId);
        $questions = Question::where('status', 1)->get();
        return view("admin.quizs.create", [
            'lesson_id' => $lessonId,
            'lesson' => $lesson,
            'questions' => $questions,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $quiz = Quiz::create($data);
        return redirect()->route('quiz.show', [
            'lesson_id' => $quiz->lesson_id
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($lessonId)
    {
        $lesson = Lesson::find($lessonId);
        $quizs = Quiz::with('question')->where('lesson_id', $lessonId)->paginate(10);
        return view("admin.quizs.show", compact('quizs', 'lesson'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $quiz = Quiz::with('lesson')->find($id);
        $questions = Question::where('status', 1)->get();
        return view("admin.quizs.edit", [
            'quiz' => $quiz,
            'questions' => $questions,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();
        $quiz = Quiz::find($id);
        $quiz->update($data);
        return redirect()->route('quiz.show', [
            'lesson_id' => $quiz->lesson_id
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $quiz = Quiz::find($id);
        $quiz->delete();
        return redirect()->route('quiz.show', [
            'lesson_id' => $quiz->lesson_id
        ]);
    }

    public function test($lessonId)
    {
        $lesson = Lesson::find($lessonId);
        $quizs = Quiz::with(['question', 'question.answers'])->where('lesson_id', $lessonId)->get();
        return view("admin.quizs.test", compact('quizs', 'lesson'));
    }

    public function submitTestForm(Request $request, $lessonId)
    {
        $data = $request->all();
        $lesson = Lesson::find($lessonId);
        $quizs = Quiz::with(['question'])->where('lesson_id', $lessonId)->get();
        $quizTest = QuizTest::where('user_id', Auth::user()->id)->whereHas('quiz', function ($query) use ($lessonId) {
            $query->where('lesson_id', $lessonId);
        })->first();
        if (!$quizTest) {
            foreach ($quizs as $key => $quiz) {
                $question = $quiz->question;
                if ($question->type == 1 || $question->type == 2) {
                    QuizTest::create([
                        'user_id' => Auth::user()->id,
                        'quiz_id' => $data['quiz_id'][$key],
                        'answer' => $data['answer_correct'][$key],
                        'answer_correct' => $question->answer_correct,
                        'is_correct' => $question->answer_correct == $data['answer_correct'][$key]
                    ]);
                } else {
                    $answerCorrect = explode(',', $question->answer_correct);
                    QuizTest::create([
                        'user_id' => Auth::user()->id,
                        'quiz_id' => $data['quiz_id'][$key],
                        'answer' => implode(',', $data['answer_correct'][$key]),
                        'answer_correct' => $question->answer_correct,
                        'is_correct' => empty(array_diff($data['answer_correct'][$key], $answerCorrect))
                    ]);
                }
            }
        }

        $quizTests = QuizTest::where('user_id', Auth::user()->id)->whereHas('quiz', function ($query) use ($lessonId) {
            $query->where('lesson_id', $lessonId);
        })->with(['quiz', 'quiz.question', 'quiz.question.answers'])->get();
        $quizTestIsCorrect = QuizTest::where('user_id', Auth::user()->id)->whereHas('quiz', function ($query) use ($lessonId) {
            $query->where('lesson_id', $lessonId);
        })->where('is_correct', 1)->count();
        return view("admin.quizs.history", compact('quizTests', 'lesson', 'quizTestIsCorrect'));
    }
}
