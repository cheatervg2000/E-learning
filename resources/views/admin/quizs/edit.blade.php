@extends('layouts.admin')

@section('title')
<title>Thêm câu hỏi</title>
@endsection

@section('css')
<link rel="stylesheet" href="{{ asset('admins/index.css') }}">
@endsection

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    @include('partials.content-header', ['name' => 'Câu hỏi', 'key' => 'Chỉnh sửa'])
    <!-- /.content-header -->
    <!-- Main content -->
    <form action="{{ route('quiz.edit', ['id' => $quiz->id]) }}" method="POST">
        <div class="content">
            <div class="container-fluid">
                <div class="column">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <i>Chú ý: Các trường có <span style="color: red">*</span> không được để trống !</i>
                        </div>
                        @csrf
                        <input type="text" class="form-control d-none" name="lesson_id" value="{{ $quiz->lesson_id }}">
                        <input type="text" class="form-control d-none" name="chapter_id" value="{{ $quiz->chapter_id }}">
                        <div class="mb-3">
                            <label>Tên bài học <span style="color: red">*</span></label>
                            <input disabled type="text" class="form-control" name="lesson_name" value="{{ $quiz->lesson->name }}">
                        </div>

                        <div class="mb-3">
                            <label>Câu hỏi<span style="color: red">*</span></label>
                            <select class="form-control" require name="question_id">
                                @foreach ($questions as $question)
                                <option value="{{$question->id}}" {{$quiz->question_id == $question->id ? 'selected' : ''}}>{{$question->content}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div><br>

                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary">Thêm</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection