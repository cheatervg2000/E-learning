@extends('layouts.admin')

@section('title')
<title>Danh sách câu hỏi</title>
@endsection

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    @include('partials.content-header', ['name' => 'Câu hỏi', 'key' => 'Danh sách'])
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="content">
                    <div class="container-fluid">
                        <div class="row">

                            <div class="col-md-12">
                                <a href="{{ route('quiz.create', ['lesson_id' => $lesson->id]) }}" class="btn btn-primary float-right">Thêm câu hỏi mới</a>
                            </div>

                            <div class="col-md-12">
                                <h2>Danh sách câu hỏi</h2>
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <td>ID</td>
                                            <td>Id câu hỏi</td>
                                            <td>Tên câu hỏi</td>
                                            <th scope="col">Khác</th>
                                        </tr>
                                    </thead>

                                    <tbody>

                                        @foreach ($quizs as $quiz)
                                        <tr>
                                            <th scope="row">{{ $quiz->id }}</th>
                                            <td>{{ $quiz->question_id }}</td>
                                            <td>{{ $quiz->question->content }}</td>
                                            <td>
                                                <a href="{{ route('quiz.edit', ['id' => $quiz->id]) }}" class="btn btn-secondary">Chỉnh sửa</a>
                                                <a href="{{ route('quiz.destroy', ['id' => $quiz->id]) }}" class="btn btn-secondary">Xóa</a>
                                            </td>
                                        </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>

                            <div class="col-md-12">
                                {{ $quizs->links() }}
                            </div>

                            <div class="col-md-12">
                                <a href="{{ route('chapter.show', ['id' => $lesson->chapter_id]) }}" class="btn btn-success">Quay lại</a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection