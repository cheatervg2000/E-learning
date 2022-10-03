@extends('layouts.admin')

@section('title')
    <title>Học viên</title>
@endsection



@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        @include('partials.content-header', ['name' => 'khóa học', 'key' => 'Thêm bài kiểm tra vào khóa'])
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12 mb-2">
                        <div class="row">
                            <div class="col-md-8">
                                <h1>Khóa học {{$course->name}}</h1>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-12">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Tên </th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Total_question</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>

                            <tbody>

                                @foreach($tests as $key => $test)
                                    <tr>
                                        <th scope="row">{{ $test->id }}</th>
                                        <td>{{ $test->name }}</td>
                                        <td>{{ $test->description }}</td>
                                        <td>{{ $test->total_question }}</td>
                                        <td>
                                            @if ($arr[$key]== 0)
                                            <a href="{{ route('course.add_test', ['id_test' => $test->id, "id" => $id]) }}"
                                                class="btn btn-warning">Thêm vào khóa học</a>       
                                            @else
                                            <p
                                                >đã tồn tại trong khóa học</p>  
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
 
                    <div class="col-md-12">
                            <a href="{{ route('course.show', ['id'=>$id]) }}" class="btn btn-success">Quay lại</a>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
