<!--
<div class="content-wrapper">
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>List Courses</h2>
    <a class="btn btn-primary" href="/courses/create" role="button">Create course</a>
    <a class="btn btn-primary" href="/chapters/create" role="button">Create chapter</a>
    <table border="1">
        <tr>
            <td>ID</td>
            <td>Name</td>
            <td>Description</td>
            <td>start_date</td>
            <td>end_date</td>
            <td>status</td>
        </tr>
        @foreach($courses as $course)
            <tr>
                <td>{{ $course->id }}</td>
                <td>{{ $course->name }}</td>
                <td>{{ $course->description }}</td>
                <td>{{ $course->start_date }}</td>
                <td>{{ $course->end_date }}</td>
                <td>{{ $course->status }}</td>
                <td>
                    <a href="/courses/update/{{ $course->id }}">Update</a> <br>
                    <a href="/courses/delete/{{ $course->id }}">Delete</a>
                <td>
            </tr>
        @endforeach
    </table>
</body>
</html>
</div>
-->
@extends('layouts.admin')

@section('title')
    <title>Course</title>
@endsection



@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        @include('partials.content-header', ['name' => 'Course', 'key' => 'List'])
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12 mb-2">
                        <div class="row">
                            <div class="col-md-8">
                                <form action="" class="row">
                                    <input type="search" class="search form-control col-md-8" placeholder="Sreach..." name="name">
                                    <button type="submit" class="btn btn-info col-md-2">Search</button>
                                </form>
                            </div>
                            <div class="col-md-4">
                                <a href="{{ route('course.create') }}" class="btn btn-primary float-right">Thêm</a>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-12">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Start_date</th>

                                    <th scope="col">End_date</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Khác</th>

                                </tr>
                            </thead>

                            <tbody>

                                @foreach($courses as $course)
                                    <tr>
                                        <th scope="row">{{ $course->id }}</th>
                                        <td>{{ $course->name }}</td>
                                        <td>{{ $course->description }}</td>
                                        <td>{{ $course->start_date }}</td>
                                        <td>{{ $course->end_date }}</td>
                                        <td>{{ $course->status }}</td>
                                        <td>
                                            <a href="{{ route('course.edit', ['id' => $course->id]) }}"
                                                class="btn btn-success">Sửa</a>
                                            <form action="{{ route('course.delete', ['id' => $course->id]) }}"
                                                method="post" style="display: inline;">
                                                @csrf
                                                @method('DELETE')
                                                <input type="submit" class="btn btn-danger" value="Xóa"
                                                    onclick=" confirm('Bạn chắc chắn muốn xóa không?')"
                                                    class="delete-course" />
                                            </form>
                                            <a href=""
                                                class="btn btn-success">Chi tiết</a>

                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>

                    <div class="col-md-12">
                        {{ $course->links() }}
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
