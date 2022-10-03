@extends('layouts.admin')

@section('title')
    <title>Học viên</title>
@endsection



@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        @include('partials.content-header', ['name' => 'Học viên', 'key' => 'Danh sách'])
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    @if (!isset($search))
                        <div class="col-md-12 mb-3">
                            <div class="col-md-12">
                                <a href="{{ route('student.create') }}" class="btn btn-primary float-right">Thêm học viên
                                    mới</a>
                            </div>
                        </div>

                        {{-- search --}}
                        <form action="{{ route('student.search') }}" method="">
                            @csrf
                            <div class="row filter-row">
                                <div class="col-sm-6 col-md-3">
                                    <div class="form-group form-focus">
                                        <label class="focus-label">Tên học viên</label>
                                        <input type="text" class="form-control floating" id="name" name="name">
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-3">
                                    <div class="form-group form-focus">
                                        <label class="focus-label">Số điện thoại</label>
                                        <input type="text" class="form-control floating" id="phone" name="phone">

                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-3">
                                    <div class="form-group form-focus">
                                        <label class="focus-label">Địa chỉ</label>
                                        <input type="text" class="form-control floating" id="address" name="address">

                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-3">
                                    <br>
                                    <button type="sumit" class="btn btn-info btn-block"> Tìm kiếm </button>
                                </div>
                            </div>
                        </form>
                    @endif
                    
                    {{-- table --}}
                    <div class="col-md-12">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Tên học viên</th>
                                    <th scope="col">Số điện thoại</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Địa chỉ</th>
                                    <th scope="col">Khác</th>

                                </tr>
                            </thead>

                            <tbody>

                                @foreach ($student as $studentItem)
                                    <tr>
                                        <th scope="row">{{ $studentItem->id }}</th>
                                        <td>{{ $studentItem->name }}</td>
                                        <td>{{ $studentItem->phone }}</td>
                                        <td>{{ $studentItem->email }}</td>
                                        <td>{{ $studentItem->address }}</td>
                                        <td>
                                            <a href="{{ route('student.edit', ['id' => $studentItem->id]) }}"
                                                class="btn btn-warning">Sửa</a>
                                            <form action="{{ route('student.delete', ['id' => $studentItem->id]) }}"
                                                method="post" style="display: inline;">
                                                @csrf
                                                @method('DELETE')
                                                <input type="submit" class="btn btn-danger" value="Xóa"
                                                    onclick=" return confirm('Bạn chắc chắn muốn xóa không?')"
                                                    class="delete-student" />
                                            </form>
                                            <a href="{{ route('student.show', ['id' => $studentItem->id]) }}"
                                                class="btn btn-success">Chi tiết</a>

                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>

                    <div class="col-md-12">
                        @if (isset($search))
                            <a href="{{ route('student.index') }}" class="btn btn-success">Quay lại</a>
                        @endif
                    </div>

                    <div class="col-md-12">
                        @if (!empty($student))
                        {{ $student->links() }} 
                        @endif
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
