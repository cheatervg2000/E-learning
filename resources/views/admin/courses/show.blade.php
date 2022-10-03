@extends('layouts.admin')

@section('title')
<title>Khóa học chi tiết</title>
@endsection

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    @include('partials.content-header', ['name' => 'Khóa học', 'key' => 'Chi tiết'])
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">

                <div class="col-lg-8 col-md-8 mb-2" style="font-size: 25px">
                    <i class="fas fa-book"></i>Thông tin chi tiết khóa học
                </div>

                    <div class="col-lg-12 col-md-12">
                        <ul class="nav nav-tabs">
                            <li class="active mr-4"><a data-toggle="tab" href="#information" class="text-success tag_a"><i
                                        class="fa fa-indent"></i> Thông tin
                                </a>
                            </li>
                            <li class="mr-4"><a data-toggle="tab" href="#student" class="text-success tag_a"><i
                                        class="fa fa-indent"></i> Danh sách học sinh đã tham gia khóa học
                                </a>
                            </li>
                            <li class="mr-4"><a data-toggle="tab" href="#test" class="text-success mr-4"><i
                                        class="fa fa-indent"></i>Danh Sách bài kiểm tra</a></li>
                        </ul>

                    <div class="tab-content">
                        <div id="information" class="tab-pane fade in active">
                            <div class="table-responsive panel">
                                <table class="table">
                                    <tbody>

                                        <tr>
                                            <td class="text-success"><i class="fas fa-book"></i>
                                                ID</td>
                                            <td>{{ $course->id }}</td>
                                        </tr>
                                        <tr>
                                            <td class="text-success"><i class="fas fa-list"></i> Tên
                                                khóa học
                                            </td>
                                            <td>{{ $course->name }}</td>
                                        </tr>
                                        <tr>
                                            <td class="text-success"><i class="fas fa-list-alt"></i>
                                                Mô tả khóa học</td>
                                            <td>{{ $course->description }}</td>
                                        </tr>
                                        <tr>
                                            <td class="text-success"><i class="fas fa-info"></i>
                                                Trạng thái</td>
                                            <td>{{ $course->status }}</td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div id="student" class="tab-pane fade">
                            <div class="table-responsive panel">
                                <div class="col-md-12">
                                    <a href="{{ route('course.view_add_student', ['id' => $course->id]) }}" class="btn btn-primary float-right">Thêm học sinh vào khóa</a>
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
                                                <a href="{{ route('course.remove.student', ['id_student' => $studentItem->id, 'id_course' => $id_course]) }}" class="btn btn-danger">Xóa khỏi khóa học</a>

                                            </td>
                                        </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div id="test" class="tab-pane fade">
                            <div class="col-md-12">
                                <a href="{{ route('course.view_add_test', ['id' => $course->id]) }}" class="btn btn-primary float-right">Thêm bài kiểm tra vào khóa học</a>
                            </div>
                            <div class="table-responsive panel">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Tên câu hỏi</th>
                                            <th scope="col">Mô tả</th>
                                            <th scope="col">Số lượng câu hỏi</th>
                                            <th scope="col">Khác</th>
                                        </tr>
                                    </thead>

                                    <tbody>

                                        @foreach($tests as $test)
                                        <tr>
                                            <th scope="row">{{ $test->id }}</th>
                                            <td>{{ $test->name }}</td>
                                            <td>{{ $test->description }}</td>
                                            <td>{{ $test->total_question }}</td>
                                            <td>
                                                <a href="{{ route('course.remove.test', ['id_test' => $test->id, 'id_course' => $id_course]) }}" class="btn btn-danger">Xóa khỏi khóa học</a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="content">
                    <div class="container-fluid">
                        <div class="row">

                            <div class="col-md-12">
                                <a href="{{ route('chapter.create', ['course_id' => $course->id]) }}" class="btn btn-primary float-right">Thêm chương mới</a>
                            </div>

                            <div class="col-md-12">
                                <h2>Danh sách chương</h2>
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <td>ID</td>
                                            <td>Khóa học_ID</td>
                                            <td>Tên chương</td>
                                            <td>Trạng thái</td>
                                            <th scope="col">Khác</th>

                                        </tr>
                                    </thead>

                                    <tbody>

                                        @foreach ($chapters as $chapter)
                                        <tr>
                                            <th scope="row">{{ $chapter->id }}</th>
                                            <td>{{ $chapter->course_id }}</td>
                                            <td>{{ $chapter->name }}</td>
                                            <td>{{ $chapter->status }}</td>
                                            <td>
                                                <a href="{{ route('chapter.show', ['id' => $chapter->id]) }}" class="btn btn-secondary">Chi tiết</a>
                                            </td>
                                        </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>

                            <div class="col-md-12">
                                {{ $chapters->links() }}
                            </div>

                            <div class="col-md-12">
                                <a href="{{ route('course.index') }}" class="btn btn-success">Quay lại</a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection