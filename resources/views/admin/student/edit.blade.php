@extends('layouts.admin')





@section('title')
    <title>Cập nhật học viên</title>
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('admins/index.css') }}">
@endsection

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        @include('partials.content-header', ['name' => 'Học viên', 'key' => 'Cập nhật'])
        <!-- /.content-header -->

        <!-- Main content -->
        <form action="{{ route('student.update', ['id' => $student->id]) }}" method="POST">
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <i>Chú ý: Các trường có <span style="color: red">*</span> không được để trống !</i>
                            </div>
                            @csrf
                            @method("PUT")
                            <div class="mb-3">
                                <label>Tên học viên <span style="color: red">*</span></label>
                                <input type="text"
                                    class="form-control @error('name') is-invalid @enderror"
                                    name="name" placeholder="Nhập tên học viên"
                                    value="{{ $student->name }}">
                                    @error('name')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                            </div>

                            <div class="mb-3">
                                <label>Số điện thoại <span style="color: red">*</span></label>
                                <input type="text" class="form-control @error('phone') is-invalid @enderror"
                                        name="phone" placeholder="Nhập số điện thoại"
                                        value="{{ $student->phone }}">
                                        @error('phone')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror

                            </div>

                            <div class="mb-3">
                                <label>Email</label>
                                <input type="text" class="form-control" disabled
                                        name="email" placeholder="Nhập email"
                                        value="{{ $student->email }}">

                            </div>

                            <div class="mb-3">
                                <label>Mật khẩu</label>
                                <input type="password" class="form-control"  disabled
                                        name="password" placeholder=""
                                        value="">

                            </div>

                            <div class="mb-3">
                                <label>Địa chỉ <span style="color: red">*</span></label>
                                <input type="text" class="form-control @error('address') is-invalid @enderror"
                                        name="address" placeholder="Nhập địa chỉ"
                                        value="{{ $student->address }}">
                                        @error('address')
                                            <div class="invalid-feedback invalid-font-size">{{ $message }}</div>
                                        @enderror
                            </div>

                            <div class="col-md-12">
                                <button type="submit" class="btn btn-success">Cập nhật</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

@endsection
