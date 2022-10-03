@extends('layouts.admin')

@section('title')
    <title>Bài học</title>
@endsection

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        @include('partials.content-header', ['name' => 'Bài học', 'key' => 'Danh sách'])
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
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
                                        <th scope="row">{{ $lesson->id }}</th>
                                        <td>{{ $lesson->chapter_id }}</td>
                                        <td>{{ $lesson->name }}</td>
                                        <td>{{ $lesson->content }}</td>
                                        <td>
                                            <a href="" class="btn btn-success">Chi tiết</a>

                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>

                    {{-- <div class="col-md-12">
                         <a href="{{ route('chapter.show', ['id'=>$lesson->chapter_id]) }}" class="btn btn-success">Quay lại</a>
                    </div> --}}

                    <div class="col-md-12">
                        {{ $lessons->links() }}
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
