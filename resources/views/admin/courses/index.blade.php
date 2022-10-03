@extends('layouts.admin')

@section('title')
    <title>Course</title>
@endsection



@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        @include('partials.content-header', ['name' => 'Khóa học', 'key' => 'Danh sách'])
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    @if (!isset($search))
                    <div class="col-md-12 mb-2">
                        <div class="row">
                            <div class="col-md-8">
                                <form action="{{ route('course.search') }}" class="row">
                                    <input type="search" class="search form-control col-md-8" placeholder="Tìm kiếm..."
                                        name="name">
                                    <button type="submit" class="btn btn-info col-md-2">Tìm kiếm</button>
                                </form>
                            </div>
                            <div class="col-md-4">
                                <a href="{{ route('course.create') }}" class="btn btn-primary float-right">Thêm khóa học
                                    mới</a>
                            </div>
                        </div>

                    </div>
                    @endif

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

                                @foreach ($courses as $course)
                                    <tr>
                                        <th scope="row">{{ $course->id }}</th>
                                        <td>{{ $course->name }}</td>
                                        <td>{{ $course->description }}</td>
                                        <td>{{ $course->start_date }}</td>
                                        <td>{{ $course->end_date }}</td>
                                        <td>{{ $course->status }}</td>
                                        <td>
                                            <a href="{{ route('course.edit', ['id' => $course->id]) }}"
                                                class="btn btn-warning">Sửa</a>
                                            <form action="{{ route('course.delete', ['id' => $course->id]) }}"
                                                method="post" style="display: inline;">
                                                @csrf
                                                @method('DELETE')
                                                <input type="submit" class="btn btn-danger" value="Xóa"
                                                    onclick=" return confirm('Bạn chắc chắn muốn xóa không?')"
                                                    class="delete-course" />
                                            </form>
                                            <a href="{{ route('course.show', ['id' => $course->id]) }}"
                                                class="btn btn-success">Chi tiết</a>

                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>

                    <div class="col-md-12">

                    </div>

                    <div class="col-md-12">
                        @if (isset($search))
                            <a href="{{ route('course.index') }}" class="btn btn-success">Quay lại</a>
                        @endif
                    </div>

                    <div class="col-md-12">
                        {{ $courses->links() }}
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
