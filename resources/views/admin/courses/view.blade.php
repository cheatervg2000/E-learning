@extends('main')
<link rel="stylesheet" href="/css/course/course_view.css" type="text/css">
@section('course_view')
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
                <source src="/movie/{{ $course->video }}" type="video/mp4">
            </video>
        </div>

        <div class="description">
            <h6>Mô tả khóa học</h6>
            <br>
            <p>
                {{ $course->description }}
            </p>

            <div class="description">
                <h6>Mô tả khóa học</h6>
                <br>
                <p>
                    {{ $course->description }}
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
            @foreach($chapters as $chapter)
            <div class="lesson">
                <p class="titles"><i class="far fa-circle"></i>Bài {{$chapter->id}} : {{$chapter->name}}</p>
                <div class="col-12">
                    <ul>
                        <li>
                            <a onclick="saveHistory(<?= $chapter->course_id ?>, <?= $chapter->id ?>)" href="{{route('lesson.view',$chapter->id)}}" class="video"><i class="fas fa-play-circle"></i>Video bài học</a>
                        </li>
                    </ul>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <div class="comment" style="margin-top: 5%">
        <h3>Nhận xét</h3>
    </div>
</div>
<script>
    function show(){
        document.getElementById('error').style.display = "block";
    }
    const csrf = '{{csrf_token()}}';
    function saveHistory(couserId, lessonSlug) {

        const params = {
            'course_id': couserId,
            'chapter': lessonSlug,
            '_token': csrf
        };
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': csrf
            },
            type: "POST",
            url: '/history',
            data: params,
            success: function(data) {
                console.log(data);
            },
        });
    }
</script>
@endsection



