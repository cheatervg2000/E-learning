
@extends('layouts.admin')

@section('title')
    <title>Cập nhật lớp học</title>
@endsection

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        @include('partials.content-header', ['name' => 'Lớp học', 'key' => 'Cập nhật'])
        <!-- /.content-header -->

        <!-- Main content -->
        
        <form action="{{ route('classroom.update', ['id' => $classroom->id]) }}" method="POST">
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6">
                        
                            @csrf
                            @method("PUT")
                            <div class="mb-3">
                                <label>Tên lớp học</label>
                                <input type="text" 
                                    class="form-control @error('name') is-invalid @enderror" 
                                    name="name" placeholder="Nhập tên lớp"
                                    value="{{$classroom->name }}">
                                    @error('name')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                            </div>

                            <div class="mb-3">
                                <label>Mô tả lớp học</label>
                                <input type="text" class="form-control @error('description') is-invalid @enderror"  
                                        name="description" placeholder="Nhập mô tả"
                                        value="{{ $classroom->description }}">
                                        @error('description')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                            </div>

                            <div class="mb-3">
                                <label>Số lượng</label>
                                <input type="text" class="form-control @error('total_student') is-invalid @enderror"  
                                        name="total_student" placeholder="Nhập mô tả"
                                        value="{{ $classroom->total_student }}">
                                        @error('total_student')
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
