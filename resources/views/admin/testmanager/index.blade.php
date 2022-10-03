@extends('layouts.admin')

@section('title')
    <title>Bài kiểm tra</title>
@endsection

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        @include('partials.content-header', ['name' => 'Bài kiểm tra', 'key' => 'Danh sách'])
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    @if (!isset($search))
                        <div class="col-md-12 mb-2">
                            <div class="row">
                                <div class="col-md-12">
                                    <a href="{{ route('testmanager.create') }}" class="btn btn-primary float-right">Thêm bài
                                        kiểm tra mới</a>
                                </div>

                                <div class="col-md-12">
                                    <form action="{{ route('testmanager.search') }}" class="row">
                                        @csrf
                                        <div class="row filter-row">
                                            <div class="col-sm-6 col-md-4">
                                                <div class="form-group form-focus">
                                                    <label class="focus-label">Tên bài kiểm tra</label>
                                                    <input type="text" class="form-control floating" id="name"
                                                        name="name">
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-md-4">
                                                <div class="form-group form-focus">
                                                    <label class="focus-label">Mô tả</label>
                                                    <input type="text" class="form-control floating" id="description"
                                                        name="description">
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-md-3">
                                                <br>
                                                <button type="sumit" class="btn btn-info btn-block"> Tìm kiếm </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                            </div>

                        </div>
                    @endif

                    <div class="col-md-12">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Tên bài kiểm tra</th>
                                    <th scope="col">Mô tả</th>
                                    <th scope="col">Số lượng câu hỏi</th>
                                    <th scope="col">Khác</th>
                                </tr>
                            </thead>

                            <tbody>

                                @foreach ($test as $test)
                                    <tr>
                                        <th scope="row">{{ $test->id }}</th>
                                        <td>{{ $test->name }}</td>
                                        <td>{{ $test->description }}</td>
                                        <td>{{ $test->total_question }}</td>
                                        <td>
                                            <a href="{{ route('testmanager.edit', ['id' => $test->id]) }}"
                                                class="btn btn-warning">Sửa</a>
                                            <form action="{{ route('testmanager.delete', ['id' => $test->id]) }}"
                                                method="post" style="display: inline;">
                                                @csrf
                                                @method('DELETE')
                                                <input type="submit" class="btn btn-danger" value="Xóa"
                                                    onclick=" return confirm('Bạn chắc chắn muốn xóa không?')"
                                                    class="delete-course" />
                                            </form>
                                            <a href="{{ route('testmanager.show', ['id' => $test->id]) }}"
                                                class="btn btn-success">Chi tiết</a>

                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>

                    <div class="col-md-12">
                        @if (isset($search))
                            <a href="{{ route('testmanager.index') }}" class="btn btn-success">Quay lại</a>
                        @endif
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
