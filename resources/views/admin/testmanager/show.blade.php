@extends('layouts.admin')

@section('title')
    <title>Bài kiểm tra</title>
@endsection

@section('css')
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

@section('js')
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous">
    </script>
@endsection

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        @include('partials.content-header', ['name' => 'Bài kiểm tra', 'key' => 'Chi tiết'])
        <!-- /.content-header -->

        <!-- Main content -->

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="row panel panel-success" style="margin-top:2%;">
                            <div class="panel-heading lead col-md-12">
                                <div class="row">
                                    <div class="col-lg-8 col-md-8 mb-2">
                                        <i class="fa fa-users"></i> Thông tin bài test
                                    </div>
                                </div>
                            </div>

                            <div class="panel-body col-md-12">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12">
                                        <ul class="nav nav-tabs">
                                            <li class="active mr-4"><a data-toggle="tab" href="#information"
                                                    class="text-success tag_a"><i class="fa fa-indent"></i>Thông tin
                                                </a>
                                            </li>
                                            <li><a data-toggle="tab" href="#question" class="text-success mr-4"><i
                                                        class="fa fa-indent"></i>Câu hỏi</a></li>

                                        </ul>

                                        <div class="tab-content">
                                            <div id="information" class="tab-pane fade in active">
                                                <div class="table-responsive panel">
                                                    <table class="table">
                                                        <tbody>

                                                            <tr>
                                                                <td class="text-success"><i class="fa fa-user"></i>
                                                                    ID</td>
                                                                <td>{{ $test->id }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="text-success"><i class="fa fa-list-ol"></i> Tên
                                                                    bài test
                                                                </td>
                                                                <td>{{ $test->name }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="text-success"><i class="fa fa-book"></i>
                                                                    Mô tả</td>
                                                                <td>{{ $test->description }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="text-success"><i class="fa fa-group"></i>
                                                                    Số lượng câu hỏi</td>
                                                                <td>{{ $test->total_question }}</td>
                                                            </tr>

                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <div id="question" class="tab-pane fade in active">
                                                <div class="table-responsive panel">
                                                    <div class="col-md-12">
                                                        <a href="{{ route('testmanager.view_add_question', ['id' => $test->id]) }}"
                                                            class="btn btn-primary float-right">Thêm câu hỏi vào bài
                                                            test</a>
                                                    </div>
                                                    <table class="table">
                                                        <thead>
                                                            <tr>
                                                                <th scope="col">Nội dung</th>
                                                                <th scope="col">Thể loại câu hỏi</th>
                                                                <th scope="col">Khác</th>

                                                            </tr>
                                                        </thead>

                                                        <tbody>

                                                            @forelse ($questions as $question)
                                                                <tr>
                                                                    <td>{{ $question->content }}</td>
                                                                    <td>
                                                                        @if ($question->type == 1)
                                                                            Câu hỏi trắc nghiệm đúng|sai
                                                                        @endif
                                                                        @if ($question->type == 2)
                                                                            Câu hỏi trắc nghiệm 1 lựa chọn
                                                                        @endif
                                                                        @if ($question->type == 3)
                                                                            Câu hỏi trắc nghiệm nhiều lựa chọn
                                                                        @endif
                                                                    </td>
                                                                    <td>
                                                                        <a href="{{ route('testmanager.remove.question', ['id_question' => $question->id, 'id_test' => $id_test]) }}"
                                                                            class="btn btn-danger">Xóa khỏi bài test</a>

                                                                    </td>
                                                                </tr>
                                                            @empty
                                                                <tr>
                                                                    <td colspan="6">Không có câu hỏi</td>
                                                                </tr>
                                                            @endforelse

                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <a href="{{ route('testmanager.index') }}" class="btn btn-success">Quay lại</a>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
    </div>
@endsection
