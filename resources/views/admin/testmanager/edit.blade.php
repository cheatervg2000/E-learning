@extends('layouts.admin')

@section('title')
    <title>Cập nhật bài kiểm tra</title>
@endsection

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        @include('partials.content-header', ['name' => 'Bài kiểm tra', 'key' => 'Cập nhật'])
        <!-- /.content-header -->

        <!-- Main content -->

        <form action="{{route('testmanager.update',[$test->id])}}" method="POST">
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6">

                            @csrf
                            @method("PUT")
                            <div class="mb-3">
                                <label>ID</label>
                                <input type="text"
                                    class="form-control" disabled
                                    name="id"
                                    value="{{ $test->id }}">
                            </div>

                            <div class="mb-3">
                                <label>Tên bài kiểm tra</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                        name="name"
                                        value="{{ $test->name }}">
                                        @error('name')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror

                            </div>

                            <div class="mb-3">
                                <label>Mô tả</label>
                                <input type="text" class="form-control @error('description') is-invalid @enderror"
                                        name="description"
                                        value="{{ $test->description }}">
                                        @error('description')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror

                            </div>

                            <div class="mb-3">
                                <label>Số lượng câu hỏi</label>
                                <input type="text" class="form-control @error('total_question') is-invalid @enderror"
                                        name="total_question"
                                        value="{{ $test->total_question }}">
                                        @error('total_question')
                                            <div class="alert alert-danger">{{ $message }}</div>
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

