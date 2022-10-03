@extends('layouts.admin')

@section('title')
    <title>Thêm sản phẩm</title>
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('admins/index.css') }}">
@endsection

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        @include('partials.content-header', ['name' => 'Course', 'key' => 'Cập nhật'])
        <!-- /.content-header -->

        <!-- Main content -->

        <form action="{{ route('course.update', [$course->id]) }}" method="POST">
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <i>Chú ý: Các trường có <span style="color: red">*</span> không được để trống !</i>
                            </div>
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label>ID</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" disabled
                                    name="id" placeholder="Nhập ID" value="{{ $course->id }}">
                                @error('name')
                                    <div class="invalid-feedback invalid-font-size">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label>Tên khóa học <span style="color: red">*</span></label>
                                <input type="text" class="form-control @error('phone') is-invalid @enderror"
                                    name="name" placeholder="input Name" value="{{ $course->name }}">
                                @error('phone')
                                    <div class="invalid-feedback invalid-font-size">{{ $message }}</div>
                                @enderror

                            </div>

                            <div class="mb-3">
                                <label>Mô tả kháo học <span style="color: red">*</span></label>
                                <input type="text" class="form-control @error('email') is-invalid @enderror"
                                    name="description" placeholder="input description" value="{{ $course->description }}">
                                @error('email')
                                    <div class="invalid-feedback invalid-font-size">{{ $message }}</div>
                                @enderror

                            </div>

                            <div class="mb-3">
                                <label>Ngày bắt đầu (mm/dd/yyyy) <span style="color: red">*</span> :</label>
                                <input type="date" class="form-control @error('start_date') is-invalid @enderror"
                                    name="start_date" value="{{ $course->start_date }}">
                                @error('start_date')
                                    <div class="invalid-feedback invalid-font-size">{{ $message }}</div>
                                @enderror

                            </div>

                            <div class="mb-3">
                                <label>Ngày kết thúc (mm/dd/yyyy) <span style="color: red">*</span> :</label>
                                <input type="date" class="form-control @error('end_date') is-invalid @enderror"
                                    name="end_date" value="{{ $course->end_date }}">
                                @error('end_date')
                                    <div class="invalid-feedback invalid-font-size">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-12">
                                <button type="submit" class="btn btn-success">Cập nhật</button>
                            </div>
                        </div>
                    </div>
                    <!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
        </form>
        <!-- /.content -->
    </div>
@endsection
