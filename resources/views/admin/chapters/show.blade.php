@extends('layouts.admin')

@section('title')
    <title>Chương học</title>
@endsection

@section('content')
    <div class="content-wrapper">
        @include('partials.content-header', ['name' => 'Chương', 'key' => 'Danh sách bài học'])

        <div class="content">
            <div class="container-fluid">
                <div class="row">

                    <div class="col-md-12">
                        <a href="{{ route('lesson.create', ['chapter_id' => $chapters->id]) }}"
                            class="btn btn-primary float-right">Thêm bài học mới</a>
                    </div>
                    <div class="col-md-12">
                        <h2>Danh sách bài học</h2>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Chương_ID</th>
                                    <th scope="col">Tên bài học</th>
                                    <th scope="col">Nội dung</th>
                                    <th scope="col">Khác</th>

                                </tr>
                            </thead>

                            <tbody>

                                @foreach ($lessons as $lesson)
                                    <tr>
                                        <th scope="row">{{ $chapters->id }}</th>
                                        <td>{{ $lesson->chapter_id }}</td>
                                        <td>{{ $lesson->name }}</td>
                                        <td>{{ $lesson->content }}</td>
                                        <td>
                                            <a href="{{ route('lesson.upload',['id' => $lesson->id]) }}" class="btn btn-secondary">Upload</a>
                                            <a href="{{ route('quiz.show', ['lesson_id' => $lesson->id]) }}" class="btn btn-secondary">Câu hỏi</a>

                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>

                    <div class="col-md-12">

                    </div>

                    <div class="col-md-12">
                        <a href="{{ route('course.index') }}" class="btn btn-success">Quay lại</a>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
