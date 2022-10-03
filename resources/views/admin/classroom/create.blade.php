@extends('layouts.admin')

@section('title')
    <title>Thêm mới học viên</title>
@endsection

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        @include('partials.content-header', ['name' => 'Lớp học', 'key' => 'Thêm mới'])
        <!-- /.content-header -->

        <!-- Main content -->
        <form action="{{ route('classroom.store') }}" method="POST">
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <i>Chú ý: Các trường có <span style="color: red">*</span> không được để trống !</i>
                            </div>
                            @csrf
                            <div class="mb-3">
                                <label>Tên lớp học <span style="color: red">*</span></label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                    name="name" placeholder="Nhập tên lớp" value="{{ old('name') }}">
                                @error('name')
                                    <div class="invalid-feedback invalid-font-size">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label>Mô tả lớp học <span style="color: red">*</span></label>
                                <input type="text" class="form-control @error('description') is-invalid @enderror"
                                    name="description" placeholder="Nhập mô tả" value="{{ old('description') }}">
                                @error('description')
                                    <div class="invalid-feedback invalid-font-size">{{ $message }}</div>
                                @enderror

                            </div>

                            <div class="mb-3">
                                <label>Số lượng <span style="color: red">*</span></label>
                                <input type="text" class="form-control @error('total_student') is-invalid @enderror"
                                    name="total_student" placeholder="Nhập số lượng" value="{{ old('total_student') }}">
                                @error('total_student')
                                    <div class="invalid-feedback invalid-font-size">{{ $message }}</div>
                                @enderror

                            </div>

                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary">Thêm</button>
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
