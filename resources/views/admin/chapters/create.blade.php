@extends('layouts.admin')

@section('title')
    <title>Chương học</title>
@endsection

@section('content')
    <div class="content-wrapper">

        @include('partials.content-header', ['name' => 'Chương', 'key' => 'Thêm mới'])

        <!-- Main content -->
        <form action="{{ route('chapter.store') }}" method="POST">
            <div class="content">
                <div class="container-fluid">
                    <div class="column">
                        <div class="col-md-6">
                            @csrf

                            <div class="mb-3">
                                <label>Khóa học_ID</label>
                                <input type="text" class="form-control"
                                    name="course_id" hidden value="{{$course_id}}">
                            </div>

                            <div class="mb-3">
                                <label>Tên chương của khóa học</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                    name="name">
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
