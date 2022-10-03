@extends('layouts.admin')
@section('title')
    <title>Ngân hàng câu hỏi</title>
@endsection


@section('content')
    <div class="content-wrapper" id="app">
        <!-- Content Header (Page header) -->
        @include('partials.content-header', ['name' => 'Ngân hàng câu hỏi', 'key' => 'Danh sách'])
        <!-- /.content-header -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    @if (!isset($search))
                        <div class="col-md-12">
                            <a href="{{ route('question.create') }}" class="btn btn-primary float-right m-2">Thêm câu hỏi
                                mới</a>
                            <button class="btn btn-secondary float-right m-2" @click="dowload_template()">Tải xuống mẫu câu
                                hỏi</button>
                        </div>
                        <div class="col-md-6">
                            <form action="{{ route('question.import') }}" enctype="multipart/form-data" method="POST"
                                id="app">
                                <div class="row">
                                    <div class="col-md-12">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-10">
                                                <input type="file" name="file" class="form-control" />
                                            </div>

                                            <div class="col-md-2">
                                                <button type="submit" class="btn btn-primary">Tải lên</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        {{-- search --}}
                        <div class="col-md-6">
                            <form action="{{ route('question.search') }}">
                                <button type="submit" class="btn btn-info ml-2 col-md-2 float-right"
                                    style="margin-right: 7px">Tìm kiếm</button>
                                <input type="search" class="search form-control col-md-8 float-right"
                                    placeholder="Tìm kiếm..." name="content">

                            </form>
                        </div>
                    @endif

                    <div class="col-md-12 mt-2">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nội dung câu hỏi</th>
                                    <th scope="col">Thể loại câu hỏi</th>
                                    <th scope="col">Khác</th>

                                </tr>
                            </thead>

                            <tbody>

                                @forelse ($questions as $question)
                                    <tr>
                                        <th scope="row">{{ $question->id }}</th>
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
                                            @if ($question->type == 4)
                                                Câu hỏi tự luận
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('question.edit', ['id' => $question->id]) }}"
                                                class="btn btn-warning">Sửa</a>
                                            <form action="{{ route('question.delete', ['id' => $question->id]) }}"
                                                method="post" style="display: inline;">
                                                @csrf
                                                @method('DELETE')
                                                <input type="submit" class="btn btn-danger" value="Xóa"
                                                    onclick=" return confirm('Bạn chắc chắn muốn xóa không?')"
                                                    class="delete-student" />
                                            </form>

                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6">No Product.</td>
                                    </tr>
                                @endforelse

                            </tbody>
                        </table>
                    </div>

                    <div class="col-md-12">
                        @if (isset($search))
                            <a href="{{ route('question.index') }}" class="btn btn-success">Quay lại</a>
                        @endif
                    </div>

                    <div class="col-md-12">
                        {{ $questions->links() }}
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection


@section('js')
    <script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>
    <script>
        var app = new Vue({
            el: "#app",
            data: {},
            methods: {
                dowload_template() {
                    console.log(window.location.origin + "/admin/question/download");
                    $url = window.location.origin + "/admin/question/download";
                    window.location = $url;
                }
            },
        });
    </script>
@endsection
