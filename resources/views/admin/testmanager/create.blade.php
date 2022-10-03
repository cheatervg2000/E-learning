@extends('layouts.admin')

@section('title')
    <title>Bài kiểm tra</title>
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('admins/index.css') }}">
@endsection

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        @include('partials.content-header', ['name' => 'Bài kiểm tra', 'key' => 'Thêm mới'])
        <!-- /.content-header -->

        <!-- Main content -->

        <form action="{{ route('testmanager.store') }}" method="POST">
            <div class="content">
                <div class="container-fluid">
                    <div class="column">
                        <div class="col-md-6">

                            @csrf
                            <div class="mb-3">
                                <i>Chú ý: Các trường có <span style="color: red">*</span> không được để trống !</i>
                            </div>
                            <div class="mb-3">
                                <label>Tên bài kiểm tra <span style="color: red">*</span></label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                    name="name" value="{{ old('name') }}">
                                @error('name')
                                    <div class="invalid-feedback invalid-font-size">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label>Mô tả <span style="color: red">*</span></label>
                                <input type="text" class="form-control @error('description') is-invalid @enderror"
                                    name="description" value="{{ old('description') }}">
                                @error('description')
                                    <div class="invalid-feedback invalid-font-size">{{ $message }}</div>
                                @enderror

                            </div>

                            <div class="mb-3">
                                <label>Số lượng câu hỏi <span style="color: red">*</span></label>
                                <input type="text" class="form-control @error('total_question') is-invalid @enderror"
                                    name="total_question" value="{{ old('total_question') }}">
                                @error('total_question')
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
