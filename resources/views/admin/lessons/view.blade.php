@extends('main')
<link rel="stylesheet" href="/css/course/course_view.css" type="text/css">
@section('lesson_view')
    <div class="container">
        <div class="link">
            <p> <a href="{{ route('main.home') }}"><i class="fas fa-home"></i>Trang chủ </a> > Khóa học {{ $course->name }}
            </p>
        </div>
        <div class="text-center">
            <img src="/images/qc.jpg" alt="quảng cáo">
        </div>
        <div class="course-name">
            <h3>{{ $course->name }}</h3>
        </div>
        <div class="video">
            <video width="1120" height="540" controls>
                <source src="/lesson/{{ $view->path_video }}" type="video/mp4">
            </video>
        </div>
        <div class="description">
            <h6>Mô tả khóa học</h6>
            <br>
            <p>
                {{ $course->description }}
            </p>

<div class="container">
    <div class="link">
        <p> <a href="{{route('main.home')}}"><i class="fas fa-home"></i>Trang chủ </a> > Khóa học {{$course->name}}</p>
    </div>
    <div class="text-center">
        <img src="/images/qc.jpg" alt="quảng cáo">
    </div>
    <div class="course-name">
        <h3>{{$course->name}}</h3>
    </div>
    <div class="video">
        <video width="1120" height="540" controls>
            <source src="/lesson/{{$view->path_video}}" type="video/mp4">
        </video>
    </div>
    <div class="description">
        <h6>Mô tả khóa học</h6>
        <br>
        <p>
            {{$course->description}}
        </p>

    </div>
    <div class="requirements">
        <h6>Yêu cầu của khóa học</h6>
        <br>
        <p>
            {{$course->requirements}}
        </p>
    </div>
    <div class="outcomes">
        <h6>Kết quả sau khóa học</h6>
        <br>
        <p>
            {{$course->outcomes}}
        </p>
    </div>
    <div class="row">
        <div class="col-md-10">
            <p>Bài giảng<i class="fas fa-caret-down"></i></p>
            @foreach($lessons as $lesson)
            <div class="lesson">
                <p class="titles"><i class="far fa-circle"></i>Bài {{$lesson->id}} : {{$lesson->content}}  {{$lesson->is_test_completed ? '(Đã hoàn thành: ' . $lesson->test_point . ' / 10)' : ''}}</p>
                <div class="col-12">
                    <ul>
                        <li>
                            <a href="" onclick="saveHistory('{{$chapter->course_id}}', '{{$chapter->name}}')" class="video"><i class="fas fa-play-circle"></i>Video bài học</a>
                        </li>
                        @if (!$lesson->is_test_completed)
                        <li>
                            <a href="{{route('quiz.test', $lesson->id)}}" class="test"><i class="fa fa-file-text"></i>Làm bài kiểm tra</a>
                        </li>
                        @endif
                        
                    </ul>
                </div>
            </div>
            @endforeach
        </div>
    </div>
@endsection
