@extends('layouts.admin')

@section('title')
    <title>Thêm học viên mới</title>
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('admins/index.css') }}">
@endsection

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        @include('partials.content-header', ['name' => 'Học viên', 'key' => 'Thêm mới'])
        <!-- /.content-header -->

        <!-- Main content -->
        <form action="{{ route('student.store') }}" method="POST">
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <i>Chú ý: Các trường có <span style="color: red">*</span> không được để trống !</i>
                            </div>

                            @csrf
                            <div class="mb-3">
                                <label>Tên học viên <span style="color: red">*</span></label>
                                <input type="text" 
                                    class="form-control @error('name') is-invalid @enderror" 
                                    name="name" placeholder="Nhập tên học viên"
                                    value="{{ old('name') }}">
                                    @error('name')
                                        <div class="invalid-feedback invalid-font-size">{{ $message }}</div>
                                    @enderror
                            </div>

                            <div class="mb-3">
                                <label>Số điện thoại <span style="color: red">*</span></label>
                                <input type="text" class="form-control @error('phone') is-invalid @enderror"  
                                        name="phone" placeholder="Nhập số điện thoại"
                                        value="{{ old('phone') }}">
                                        @error('phone')
                                            <div class="invalid-feedback invalid-font-size">{{ $message }}</div>
                                        @enderror
                                
                            </div>

                            <div class="mb-3">
                                <label>Email <span style="color: red">*</span></label>
                                <input type="text" class="form-control @error('email') is-invalid @enderror"  
                                        name="email" placeholder="Nhập email"
                                        value="{{ old('email') }}">
                                        @error('email')
                                            <div class="invalid-feedback invalid-font-size">{{ $message }}</div>
                                        @enderror
                                
                            </div>

                            <div class="mb-3">
                                <label>Mật khẩu <span style="color: red">*</span></label>
                                <input type="password" class="form-control @error('password') is-invalid @enderror"  
                                        name="password" placeholder="Nhập mật khẩu"
                                        value="{{ old('password') }}">
                                        @error('password')
                                            <div class="invalid-feedback invalid-font-size">{{ $message }}</div>
                                        @enderror
                                
                            </div>

                            <div class="mb-3">
                                <label>Địa chỉ <span style="color: red">*</span></label>
                                <input type="text" class="form-control @error('address') is-invalid @enderror"  
                                        name="address" placeholder="Nhập địa chỉ"
                                        value="{{ old('address') }}">
                                        @error('address')
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
