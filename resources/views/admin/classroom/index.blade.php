@extends('layouts.admin')
@section('title')

@section('content')
    <div class="content-wrapper" id="app">
        <!-- Content Header (Page header) -->
        @include('partials.content-header', ['name' => 'Lớp học', 'key' => 'Danh sách'])
        <!-- /.content-header -->
        
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    @if (!isset($search))
                    <div class="col-md-12">
                        <a href="{{ route('classroom.create') }}" class="btn btn-primary float-right">Thêm lớp học mới</a>
                    </div>
                    <div class="col-md-12" >
                        <form action="{{ route('classroom.search') }}" class="row">        
                            @csrf
                            <div class="row filter-row">
                                <div class="col-sm-6 col-md-4">
                                    <div class="form-group form-focus">
                                        <label class="focus-label">Tên lớp học</label>
                                        <input type="text" class="form-control floating" id="name" name="name">
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-4">
                                    <div class="form-group form-focus">
                                        <label class="focus-label">Mô tả</label>
                                        <input type="text" class="form-control floating" id="description" name="description">
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-3">
                                    <br>
                                    <button type="sumit" class="btn btn-info btn-block"> Tìm kiếm </button>
                                </div>
                            </div>               
                        </form>
                    </div>
                    @endif
                    <div class="col-md-12 mt-2">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Tên lớp</th>
                                    <th scope="col">Mô tả</th>
                                    <th scope="col">Số lượng học viên</th>
                                    <th scope="col">Khác</th>
                                </tr>
                            </thead>

                            <tbody>

                                @forelse($classrooms as $classroom)
                                    <tr>
                                        <td>{{ $classroom->id }}</td>
                                        <td>{{ $classroom->name }}</td>
                                        <td>{{ $classroom->description }}</td>
                                        <td>{{count($classroom->students)}}/{{ $classroom->total_student }}</td>
                                        <td>
                                            <a href="{{ route('classroom.edit', ['id' => $classroom->id]) }}"
                                                class="btn btn-warning">Sửa</a>                                           
                                            <form action="{{ route('classroom.delete', ['id' => $classroom->id]) }}"
                                                method="post" style="display: inline;">
                                                @csrf
                                                @method('DELETE')
                                                <input type="submit" class="btn btn-danger" value="Xóa"
                                                    onclick=" return confirm('Bạn chắc chắn muốn xóa không?')"
                                                    class="delete-student" />
                                            </form>
                                            <a href="{{ route('classroom.show', ['id' => $classroom->id]) }}"
                                                class="btn btn-success">Chi tiết</a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td class="5">Chưa có CSDL</td>
                                    </tr>
                                @endforelse

                            </tbody>
                        </table>
                    </div>

                    <div class="col-md-12">
                        @if (isset($search))
                            <a href="{{ route('classroom.index') }}" class="btn btn-success">Quay lại</a>
                        @endif
                    </div>

                    <div class="col-md-12">
                        {{ $classrooms->links() }}
                    </div>

                </div>
            </div>
        </div>
    </div>
@stop
