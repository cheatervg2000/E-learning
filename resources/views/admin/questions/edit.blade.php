@extends('layouts.admin')

@section('title')
    <title>Sửa câu hỏi</title>
@endsection

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        @include('partials.content-header', ['name' => 'Ngân hàng câu hỏi', 'key' => 'Cập nhật'])
        <!-- /.content-header -->

        <!-- Main content -->
        <form action="{{ route('question.update', ['id' => $question->id]) }}" method="POST" id="app"
            style="padding-left: 8px">
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6">

                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                                <div><label>Thể loại câu hỏi</label></div>
                                <select name="type" class="form-control" disabled>
                                    <option value="0">Chọn loại câu hỏi</option>
                                    <option value="1" @if ($question->type == 1) @selected(true) @endif>Câu hỏi
                                        trắc nghiệm đúng|sai</option>
                                    <option value="2" @if ($question->type == 2) @selected(true) @endif>Câu hỏi
                                        trắc nghiệm 1 lựa chọn</option>
                                    <option value="3" @if ($question->type == 3) @selected(true) @endif>Câu hỏi
                                        trắc nghiệm nhiều lựa chọn</option>
                                    <option value="4" @if ($question->type == 4) @selected(true) @endif>Câu hỏi
                                        tự luận</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label>Nội dung câu hỏi</label>
                                <input type="text" class="form-control @error('content') is-invalid @enderror"
                                    name="content" placeholder="content" value="{{ $question->content }}">
                                @error('content')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div v-if="type != 0">
                                <label>Đáp Án</label>
                                @if ($question->type == 1)
                                    <div class="mb-3">
                                        <input disabled name="answer_correct" type="radio" id="yes" value="1"
                                            @if ($question->answer_correct == 1) @checked(true) @endif />
                                        <label for="yes" class="mr-5">Đúng</label>
                                        <input disabled name="answer_correct" type="radio" id="no" value="0"
                                            @if ($question->answer_correct == 0) @checked(true) @endif />
                                        <label for="no">Sai</label>

                                    </div>
                                @endif
                                @if ($question->type == 2)
                                    <div class="mb-3">
                                        @foreach ($question->answers as $key => $answer)
                                            <div>
                                                @if ($question->answer_correct == $answer->id)
                                                    <input disabled type="radio" name="answer_correct"
                                                        @checked(true) value="{{ $key }}" />
                                                @else
                                                    <input disabled type="radio" name="answer_correct"
                                                        value="{{ $key }}" />
                                                @endif

                                                <input disabled type="text" value="{{ $answer->answer }}"
                                                    style="width: 90%; display: inline-block; margin: 5px 0px"
                                                    class="form-control" />
                                            </div>
                                        @endforeach
                                    </div>
                                @endif
                                @if ($question->type == 3)
                                    <div class="mb-3">
                                        @foreach ($question->answers as $key => $answer)
                                            <div>
                                                @if (in_array($answer->id, explode(',', $question->answer_correct)))
                                                    <input disabled type="checkbox" name="answer_correct[]"
                                                        @checked(true) value="{{ $key }}" />
                                                @else
                                                    <input disabled type="checkbox" name="answer_correct[]"
                                                        value="{{ $key }}" />
                                                @endif

                                                <input disabled type="text" name="answer[]" value="{{ $answer->answer }}"
                                                    style="width: 90%; display: inline-block; margin: 5px 0px"
                                                    class="form-control" />
                                            </div>
                                        @endforeach
                                    </div>
                                @endif
                                @if ($question->type == 4)
                                    <div class="mb-3">
                                        <textarea disabled name="answer_correct" class="form-control">{{ $question->answer_correct }}</textarea>
                                    </div>
                                @endif
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
