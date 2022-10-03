@extends('layouts.admin')
@section('content')
    <div class="content-wrapper">

        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Class Room</title>
        </head>
        @include('partials.content-header', ['name' => 'Lớp học', 'key' => 'chi tiết'])

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <ul class="nav nav-tabs">
                            <li class="active mr-4"><a data-toggle="tab" href="#information" class="text-success tag_a"><i
                                        class="fa fa-indent"></i> Thông tin
                                </a>
                            </li>
                            <li class="active mr-4"><a data-toggle="tab" href="#course" class="text-success tag_a"><i
                                    class="fa fa-indent"></i> Danh sách khóa học của lớp
                                </a>
                            </li>
                            <li class="active mr-4"><a data-toggle="tab" href="#student" class="text-success tag_a"><i
                                class="fa fa-indent"></i> Danh sách học sinh của lớp học
                                </a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div id="information" class="tab-pane fade in active">
                                <div class="table-responsive panel">
                                    <table class="table">
                                        <tbody>
    
                                            <tr>
                                                <td class="text-success"><i class="fa fa-user"></i>
                                                    ID</td>
                                                <td>{{ $classroom->id }}</td>
                                            </tr>
                                            <tr>
                                                <td class="text-success"><i class="fa fa-list-ol"></i> Tên
                                                    lớp học
                                                </td>
                                                <td>{{ $classroom->name }}</td>
                                            </tr>
                                            <tr>
                                                <td class="text-success"><i class="fa fa-book"></i>
                                                    Mô tả</td>
                                                <td>{{ $classroom->description }}</td>
                                            </tr>
                                            <tr>
                                                <td class="text-success"><i class="fa fa-group"></i>
                                                   số lượng</td>
                                                <td>{{count($classroom->students)}}/{{ $classroom->total_student }}</td>
                                            </tr>
    
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div id="course" class="tab-pane fade in active">
                                <h1>Danh sách khóa học đã đăng ký</h1>
                                <div class="table-responsive panel">
                                    <div class="col-md-12">
                                        <a href="{{ route('classroom.view_add_course', ['id' => $classroom->id]) }}"
                                            class="btn btn-primary float-right">Thêm  khóa học vào lớp</a>
                                    </div>
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Tên khóa học</th>
                                                <th scope="col">Mô tả</th>
                                                <th scope="col">Ngày bắt đầu</th>
                                                <th scope="col">Ngày kết thúc</th>
                                                <th scope="col">Trạng thái</th>
                                                <th>Khác</th>
            
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
                                                        <a href="{{ route('classroom.remove.course', ['id_course' => $course->id, 'id_classroom' => $id_class]) }}"
                                                            class="btn btn-danger">Xóa khóa học khỏi lớp học</a>
                                                    </td>
                                                </tr>
                                            @endforeach
            
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            
                            <div id="student" class="tab-pane fade in active">
                                <div class="table-responsive panel">
                                    <h1>Danh sách học sinh tham gia lớp học</h1>
                                    <div class="col-md-12">
                                        <a href="{{route('classroom.view_add_student',['id' => $id_class])}}"
                                            class="btn btn-success float-right">Thêm học sinh vào lớp học</a>
                                    </div>
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
            
                                            @foreach ($students as $studentItem)
                                                <tr>
                                                    <th scope="row">{{ $studentItem->id }}</th>
                                                    <td>{{ $studentItem->name }}</td>
                                                    <td>{{ $studentItem->phone }}</td>
                                                    <td>{{ $studentItem->email }}</td>
            
                                                    <td>{{ $studentItem->address }}</td>
                                                    <td>
                                                        <a href="{{ route('classroom.remove.student', ['id_student' => $studentItem->id, 'id_classroom' => $id_class]) }}"
                                                            class="btn btn-danger">Xóa học viên khỏi lớp học</a>
                                                    </td>
                                                </tr>
                                            @endforeach
            
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        
                    </div>

                </div>
            </div>
        </div>
        <div class="col-md-12">
            <a href="{{ route('classroom.index') }}" class="btn btn-primary">Quay lại</a>
        </div>
    </div>
@endsection
