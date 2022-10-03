@extends('layouts.admin')

@section('title')
    <title>Thêm khóa học</title>
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('admins/index.css') }}">
@endsection

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        @include('partials.content-header', ['name' => 'Khóa học', 'key' => 'Thêm mới'])
        <!-- /.content-header -->

        <!-- Main content -->
        <form action="{{ route('course.store') }}" method="POST">
            <div class="content">
                <div class="container-fluid">
                    <div class="column">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <i>Chú ý: Các trường có <span style="color: red">*</span> không được để trống !</i>
                            </div>
                            @csrf

                            <div class="mb-3">
                                <label>Tên khóa học <span style="color: red">*</span></label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                    name="name" value="{{ old('name') }}">
                                @error('name')
                                    <div class="invalid-feedback invalid-font-size">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label>Mô tả khóa học <span style="color: red">*</span></label>
                                <input type="text" class="form-control @error('description') is-invalid @enderror"
                                    name="description" value="{{ old('description') }}">
                                @error('description')
                                    <div class="invalid-feedback invalid-font-size">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label>Ngày bắt đầu khóa học (mm/dd/yyyy) <span style="color: red">*</span> :</label>
                                <input type="date" name="start_date"
                                    class="form-control @error('start_date') is-invalid @enderror"
                                    value="{{ old('start_date') }}">
                                @error('start_date')
                                    <div class="invalid-feedback invalid-font-size">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label>Ngày kết thúc khóa học (mm/dd/yyyy) <span style="color: red">*</span> :</label>
                                <input type="date" name="end_date"
                                    class="form-control @error('end_date') is-invalid @enderror"
                                    value="{{ old('end_date') }}">
                                @error('end_date')
                                    <div class="invalid-feedback invalid-font-size">{{ $message }}</div>
                                @enderror
                            </div>
                        </div><br>

                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary">Thêm</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
