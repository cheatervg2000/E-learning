@extends('layouts.admin')

@section('title')
    <title>Học viên</title>
@endsection



@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        @include('partials.content-header', ['name' => 'Lớp học', 'key' => 'Thêm khóa học vào lớp'])
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    {{-- <div class="col-md-12 mb-2">
                        <div class="row">
                            <div class="col-md-8">
                                <form action="{{ route('student.search') }}" class="row">
                                    <input type="search" class="search form-control col-md-8 mr-2" placeholder="Tìm kiếm..." name="name">
                                    <button type="submit" class="btn btn-info col-md-2 float-right">Tìm kiếm</button>
                                </form>
                            </div>
                        </div>
                    </div> --}}
                    <h1>Lớp {{$classroom->name}}</h1>
                    <div class="col-md-12">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Tên khóa học</th>
                                    <th scope="col">Mô tả</th>
                                    <th scope="col">Ngày bắt đầu</th>
                                    <th scope="col">Ngày kết thúc</th>
                                    <th scope="col">Trạng thái</th>
                                    <th scope="col">Khác</th>

                                </tr>
                            </thead>

                            <tbody>

                                @foreach($courses as $key => $course)
                                    <tr>
                                        <th scope="row">{{ $course->id }}</th>
                                        <td>{{ $course->name }}</td>
                                        <td>{{ $course->description }}</td>
                                        <td>{{ $course->start_date }}</td>
                                        <td>{{ $course->end_date }}</td>
                                        <td>{{ $course->status }}</td>
                                        <td>
                                            @if ($arr[$key]== 0)
                                            <a href="{{ route('classroom.add_course', ['id_course' => $course->id, "id" => $id]) }}"
                                                class="btn btn-warning">Thêm vào lớp học</a>       
                                            @else
                                            <p
                                                >Đã thêm vào lớp học</p>  
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
 
                    <div class="col-md-12">
                            <a href="{{ route('classroom.show', ['id'=>$id]) }}" class="btn btn-success">Quay lại</a>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
