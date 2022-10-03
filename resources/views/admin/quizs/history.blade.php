@extends('main')
<link rel="stylesheet" href="/css/course/course_view.css" type="text/css">
<style>
    .labelCorrect {
        color: #392;
    }
    .labelIncorrect {
        color: #932;
    }
    .yes {
        border: 2px solid white;
        box-shadow: 0 0 0 1px #392;
        appearance: none;
        border-radius: 50%;
        width: 12px;
        height: 12px;
        background-color: #fff;
        transition: all ease-in 0.2s;

    }

    .yes:checked {
        background-color: #392;
    }

    .no {
        border: 2px solid white;
        box-shadow: 0 0 0 1px #932;
        appearance: none;
        border-radius: 50%;
        width: 12px;
        height: 12px;
        background-color: #fff;
        transition: all ease-in 0.2s;

    }

    .no:checked {
        background-color: #932;
    }
</style>
@section('lesson_view')


<div class="container">
    <h3 class="pt-5" style="text-align: center">Bài kiểm tra</h3>
    <p class="pt-1" style="text-align: center; color: red">Tổng điểm: {{round($quizTestIsCorrect / count($quizTests), 2) * 10}} / 10</p>
    <form action="{{ route('quiz.create-test', ['lesson_id' => $lesson->id]) }}" method="POST">
        @csrf
        @foreach($quizTests as $key => $quizTest)
        <div class="mt-3">
            <div class="{{$quizTest->is_correct ? 'labelCorrect' : 'labelIncorrect'}}">Câu {{$key + 1}}: {{$quizTest->quiz->question->content}}</div>
        </div>

        <div>
            <label>Đáp Án</label>
            @if($quizTest->quiz->question->type == 1)
            <div class="mb-1">
                <div>
                    <input disabled {{$quizTest->answer == 1 || $quizTest->answer_correct == 1 ? 'checked' : ''}} type="radio"  class="{{in_array(1, explode(',', $quizTest->answer_correct)) ? 'yes' : 'no'}}" />
                    <label>Đúng</label>
                </div>
                <div>
                    <input disabled {{$quizTest->answer == 0 || $quizTest->answer_correct == 0 ? 'checked' : ''}} type="radio" class="{{in_array(0, explode(',', $quizTest->answer_correct)) ? 'yes' : 'no'}}"  />
                    <label>Sai</label>
                </div>
            </div>
            @else
            <div class="mb-1">
                @foreach($quizTest->quiz->question->answers as $answerkey => $answer)
                <div>
                    <input type="{{$quizTest->quiz->question->type == 2 ? 'radio' : 'checkbox'}}" disabled 
                    {{in_array($answer->id, explode(',', $quizTest->answer_correct)) || in_array($answer->id, explode(',', $quizTest->answer)) ? 'checked' : ''}} 
                    class="{{in_array($answer->id, explode(',', $quizTest->answer_correct)) ? 'yes' : 'no'}}"/>
                    <label>{{$answer->answer}}</label>
                </div>
                @endforeach
            </div>
            @endif
        </div>
        @endforeach
    </form>
</div>

@endsection