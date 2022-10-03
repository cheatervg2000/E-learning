
@extends('layouts.admin')

@section('title')
    <title>Thêm bài học mới</title>
@endsection

@section('content')
    <div class="content-wrapper">

        @include('partials.content-header', ['name' => 'Bài học', 'key' => 'Thêm mới'])

        <!-- Main content -->
        <form action="{{ route('lesson.store') }}" method="POST">
            <div class="content">
                <div class="container-fluid">
                    <div class="column">
                        <div class="col-md-6">
                            @csrf

                            <div class="mb-3">
                                <label>Chương_ID</label>
                                <input type="text" class="form-control"
                                    name="chapter_id" hidden value="{{$chapter_id}}">
                            </div>

                            <div class="mb-3">
                                <label>Tên bài học</label>
                                <input type="text" class="form-control"
                                    name="name">
                            </div>

                            <div class="mb-3">
                                <label>Nội dung</label>
                                <input type="text" class="form-control"
                                    name="content">
                            </div>

                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary">Thêm</button>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
