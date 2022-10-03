@extends('layouts.admin')

@section('title')
    <title>Bài kiểm tra</title>
@endsection



@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        @include('partials.content-header', ['name' => 'Bài kiểm tra', 'key' => 'Thêm câu hỏi vào bài kiểm tra'])
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12 mb-2">
                        <div class="row">
                            <div class="col-md-8">
                                <h1>{{$test->name}}</h1>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-12">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Nội dung</th>
                                    <th scope="col">Loại câu hỏi</th>
                                    <th scope="col">Khác</th>

                                </tr>
                            </thead>

                            <tbody>

                                @forelse ($questions as $key => $question)
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
                                            @if ($arr[$key]== 0)
                                            <a href="{{ route('testmanager.add_question', ['id_question' => $question->id, "id" => $id]) }}"
                                                class="btn btn-warning">Thêm vào bài kiểm tra</a>       
                                            @else
                                            <p
                                                >Đã tồn tại trong bài kiểm tra</p>  
                                            @endif
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6">Không có câu hỏi</td></td>
                                    </tr>
                                @endforelse

                            </tbody>
                        </table>
                    </div>
 
                    <div class="col-md-12">
                            <a href="{{ route('testmanager.show', ['id'=>$id]) }}" class="btn btn-success">Quay lại</a>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
