@extends('main')
<link rel="stylesheet" href="/css/course/course_view.css" type="text/css">
@section('lesson_view')

<div class="container">
    <h3 class="pt-5" style="text-align: center">Bài kiểm tra</h3>
    <form action="{{ route('quiz.create-test', ['lesson_id' => $lesson->id]) }}" method="POST">
        @csrf
        @foreach($quizs as $key => $quiz)
        <input type="text" class="form-control d-none" name="quiz_id[]" value="{{ $quiz->id }}">
        <div class="mt-3">
            <div>Câu {{$key + 1}}: {{$quiz->question->content}}</div>
        </div>

        <div>
            <label>Đáp Án</label>
            @if($quiz->question->type == 1)
            <div class="mb-1">
                <div>
                    <input name="answer_correct[{{$key}}]" type="radio" id="yes_[{{$key}}]" value="1" />
                    <label for="yes_[{{$key}}]">Đúng</label>
                </div>
                <div>
                    <input name="answer_correct[{{$key}}]" type="radio" id="no_[{{$key}}]" value="0" />
                    <label for="no_[{{$key}}]">Sai</label>
                </div>
            </div>
            @else
            <div class="mb-1">
                @foreach($quiz->question->answers as $answerkey => $answer)
                <div>
                    <input type="{{$quiz->question->type == 2 ? 'radio' : 'checkbox'}}" name="{{$quiz->question->type == 2 ? 'answer_correct[' . $key . ']' : 'answer_correct[' . $key . '][]'}}" value="{{$answer->id}}" id="answer_{{$answer->id}}" />
                    <label for="answer_{{$answer->id}}">{{$answer->answer}}</label>
                </div>
                @endforeach
            </div>
            @endif
        </div>
        @endforeach

        <div class="col-md-12">
            <button type="submit" class="btn btn-primary">Nộp bài</button>
        </div>
    </form>
</div>

@endsection