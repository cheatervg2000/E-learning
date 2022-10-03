@extends('layouts.admin')

@section('title')
    <title>Học viên</title>
@endsection



@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        @include('partials.content-header', ['name' => 'khóa học', 'key' => 'Thêm học sinh vào khóa'])
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12 mb-2">
                        <div class="row">
                            <div class="col-md-8">
                                <h1>Khóa học {{ $course->name }}</h1>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Tên học viên</th>
                                    <th scope="col">Số điện thoại</th>
                                    <th scope="col">Email</th>

                                    <th scope="col">Địa chỉ</th>
                                    <th scope="col">Khác</th>

                                </tr>
                            </thead>

                            <tbody>

                                @foreach ($students as $key => $studentItem)
                                    <tr>
                                        <th scope="row">{{ $studentItem->id }}</th>
                                        <td>{{ $studentItem->name }}</td>
                                        <td>{{ $studentItem->phone }}</td>
                                        <td>{{ $studentItem->email }}</td>

                                        <td>{{ $studentItem->address }}</td>
                                        <td>
                                            @if ($arr[$key] == 0)
                                                <a href="{{ route('course.add_student', ['id_student' => $studentItem->id, 'id' => $id]) }}"
                                                    class="btn btn-warning">Thêm vào khóa học</a>
                                            @else
                                                <p>đã tồn tại trong khóa học</p>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>

                    <div class="col-md-12">
                        <a href="{{ route('course.show', ['id' => $id]) }}" class="btn btn-success">Quay lại</a>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
