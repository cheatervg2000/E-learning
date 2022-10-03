@extends('main')
@section('history')
    <link rel="stylesheet" href="/css/controll.css" type="text/css" media="all">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <div class="container" style="margin: 3% auto">
        <div class="home">
            <p >
                <a href="{{route('main.home')}}"><i class="fas fa-home"></i>Trang chủ</a>> Profile</p>

            </p>
        </div>
        <div class="row">
        <div class="col-md-3 ">
                <div class="list-group ">
                    <a href="{{route('profile.profile')}}" style="background-color: forestgreen" class=" text-white list-group-item list-group-item-action">THÔNG TIN CÁ NHÂN</a>
                    <a href="" class="list-group-item list-group-item-action ">Cập nhật thông tin</a>
                    <a href="{{route('profile.change_password')}}" class="list-group-item list-group-item-action active">Thay đổi mật khẩu</a>
                    <a href="" class="list-group-item list-group-item-action">Lịch sử khóa học</a>


                </div>
            </div>
                <div class="col-md-9">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <h4>Lịch sử khóa học</h4>
                                    <hr>
                                </div>
                                <div class="col-md-12">
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Tên khóa học</th>
                                            <th scope="col">Tên bài giảng hiện tại</th>
                                            <th scope="col">Ngày xem</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($histories->items() as $history)
                                            <tr>
                                                <th scope="row">{{$history->id}}</th>
                                                <td><p target="_blank" href="">{{$history->course->name}}</p></td>
                                                <td><a target="_blank" href="">Bài {{$history->chapter->course_id}}: {{$history->chapter->name}}</a></td>
                                                <td>{{$history->created_at}}</td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                    <div class="d-flex justify-content-end">
                                        {{$histories->links("pagination::bootstrap-4")}}
                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>

        </div>
    </div>
@endsection
