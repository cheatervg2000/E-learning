@extends('layouts.admin')

@section('title')
    <title>Thông tin chi tiết</title>
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('admins/index.css') }}">
@endsection

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        @include('partials.content-header', ['name' => 'Học viên', 'key' => 'Thông tin chi tiết'])
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="col-lg-8 col-md-8 mb-3 lead">
                            <i class="fa fa-users"></i> Thông tin chi tiết học viên
                        </div>
                        {{-- img student --}}
                        <div class="panel-body col-md-12">
                            <div class="row">
                                <div class="col-lg-3 col-md-3">
                                    <center>
                                        <span class="text-left">
                                            @if (empty($student->name_img))
                                                <img src="{{ asset('images/logo1.jpg') }}"
                                                    style="height: 200px; weight: 200px;"
                                                    class="img-responsive img-thumbnail">
                                            @else
                                                <img src="{{ asset($student->name_img) }}"
                                                    style="height: 200px; weight: 200px;"
                                                    class="img-responsive img-thumbnail">
                                            @endif

                                        </span>
                                    </center>

                                    <table class="table">
                                        <tbody>
                                            <tr>
                                                <td class="text-center">
                                                    <form action="{{ route('student.uploadimg') }}"
                                                            enctype="multipart/form-data" method="post">
                                                        @csrf
                                                        <input type="hidden" name="student_id" value="{{ $student->id }}">
                                                        <input type="file" name="name_img" class="@error('name_img') is-invalid @enderror">
                                                        @error('name_img')
                                                            <div class="invalid-feedback invalid-font-size">{{ $message }}</div>
                                                        @enderror
                                                        <button type="submit" class="btn btn-success">Đổi ảnh</button>                                                     
                                                    </form>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                {{-- information student --}}
                                <div class="col-lg-9 col-md-9">
                                    <ul class="nav nav-tabs">
                                        <li class="active mr-4"><a data-toggle="tab" href="#information"
                                                class="text-success tag_a"><i class="fa fa-indent"></i>Thông tin
                                            </a>
                                        </li>
                                        <li><a data-toggle="tab" href="#course" class="text-success mr-4"><i
                                                    class="fa fa-book"></i>Khóa học</a></li>
                                        <li><a data-toggle="tab" href="#classroom" class="text-success mr-4"><i
                                                    class="fa-solid fa-screen-users"></i>Lớp học</a></li>
                                        <li><a data-toggle="tab" href="#General" class="text-success mr-4"><i
                                                    class="fa fa-info tag_a"></i> Khác</a></li>
                                    </ul>

                                    <div class="tab-content">
                                        <div id="information" class="tab-pane fade in active">
                                            <div class="table-responsive panel">
                                                <table class="table">
                                                    <tbody>

                                                        <tr>
                                                            <td class="text-success"><i class="fa fa-user"></i>
                                                                Họ và tên</td>
                                                            <td>{{ $student->name }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-success"><i class="fa fa-list-ol"></i> Số
                                                                điện thoại
                                                            </td>
                                                            <td>{{ $student->phone }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-success"><i class="fa fa-book"></i>
                                                                Email</td>
                                                            <td>{{ $student->email }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-success"><i class="fa fa-group"></i>
                                                                Địa chỉ</td>
                                                            <td>{{ $student->address }}</td>
                                                        </tr>

                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>

                                        <div id="classroom" class="tab-pane fade">
                                            <div class="table-responsive panel">
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col">Id</th>
                                                            <th scope="col">Tên lớp</th>
                                                            <th scope="col">Mô tả</th>
                                                            <th scope="col">Số lượng học viên</th>
                                                        </tr>
                                                    </thead>

                                                    <tbody>

                                                        @forelse($classrooms as $classroom)
                                                            <tr>
                                                                <td>{{ $classroom->id }}</td>
                                                                <td>{{ $classroom->name }}</td>
                                                                <td>{{ $classroom->description }}</td>
                                                                <td>{{ count($classroom->students) }}/{{ $classroom->total_student }}
                                                                </td>
                                                            </tr>
                                                        @empty
                                                            <tr>
                                                                <td class="5">No Classroom</td>
                                                            </tr>
                                                        @endforelse

                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div id="course" class="tab-pane fade">
                                            <div class="table-responsive panel">
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col">#</th>
                                                            <th scope="col">Tên khóa học</th>
                                                            <th scope="col">Mô tả</th>
                                                            <th scope="col">Ngày bắt đầu</th>
                                                            <th scope="col">Ngày kết thúc</th>
                                                            <th scope="col">Trạng thái</th>

                                                        </tr>
                                                    </thead>

                                                    <tbody>

                                                        @foreach ($courses as $course)
                                                            <tr>
                                                                <th scope="row">{{ $course->id }}</th>
                                                                <td>{{ $course->name }}</td>
                                                                <td>{{ $course->description }}</td>
                                                                <td>{{ $course->start_date }}</td>
                                                                <td>{{ $course->end_date }}</td>
                                                                <td>{{ $course->status }}</td>

                                                            </tr>
                                                        @endforeach

                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div id="General" class="tab-pane fade">
                                            {{-- <div class="table-responsive panel">
                                                <table class="table">
                                                    <tbody>
                                                        <tr>
                                                            <td class="text-success"><i class="fa fa-university"></i>
                                                                Last School
                                                            </td>
                                                            <td>Pawan Mall's School</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-success"><i class="fa fa-calendar"></i>
                                                                Date of
                                                                Admission</td>
                                                            <td>March 4, 2009</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-success"><i class="fa fa-home"></i> Birth
                                                                Place</td>
                                                            <td>Delhi</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-success"><i class="fa fa-calendar"></i>
                                                                Academic Year
                                                            </td>
                                                            <td>2015-2016</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-success"><i class="fa fa-medkit"></i>
                                                                Medical Condition
                                                            </td>
                                                            <td>Normal</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-success"><i class="fa fa-thumbs-up"></i>
                                                                Active/Inactive</td>
                                                            <td>Student is Active</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-success"><i
                                                                    class="glyphicon glyphicon-time"></i> Last
                                                                Editing</td>
                                                            <td>2015-08-20 09:41:56</td>
                                                        </tr>

                                                    </tbody>
                                                </table>
                                            </div> --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <a href="{{ route('student.index') }}" class="btn btn-success">Quay lại</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
