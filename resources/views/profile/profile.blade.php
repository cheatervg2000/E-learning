@extends('main')
@section('profile')

    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <div class="container" style="margin: 3% auto">
        <div class="home">
            <p style="font-size: 18px; margin-top: 1%; margin-bottom: 3%"><a href="{{route('home')}}"><i class="fas fa-home"></i>Trang chủ</a> > Profile</p>
        </div>
        <div class="row">
            <div class="col-md-3 ">
                <div class="list-group ">
                    <a href="" class="list-group-item list-group-item-action active">PROFILE</a>
                    <a href="{{ route('profile.edit', auth()?->user()?->id) }}" class="list-group-item list-group-item-action">Cập nhật thông tin</a>
                    <a href="{{route('profile.change_password')}}" class="list-group-item list-group-item-action">Thay đổi mật khẩu</a>
                    <a href="{{route('profile.history')}}" class="list-group-item list-group-item-action">Lịch sử khóa học</a>
                    <a href="" class="list-group-item list-group-item-action">Tiến Độ Các Khóa Học</a>
                </div>
            </div>

                <div class="col-md-9">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <h4>Your Profile</h4>
                                    <hr>
                                </div>
                            </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group row">
                                            <label for="username" class="col-4 col-form-label">Tài khoản </label>
                                            <div class="col-8">
                                                <input class="form-control here" disabled type="text" value="<?php if (isset(auth()->user()->name)) {
                                                        echo auth()->user()->name;
                                                    }?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="username" class="col-4 col-form-label">Email </label>
                                            <div class="col-8">
                                                <input class="form-control here" disabled type="text" value="<?php if (!empty(auth()->user()->email)) {
                                                        echo auth()->user()->email;
                                                    }?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="username" class="col-4 col-form-label">Phone </label>
                                            <div class="col-8">
                                                <input class="form-control here" disabled type="text" value="  <?php if (!empty(auth()->user()->phone)) {
                                                        echo auth()->user()->phone;
                                                    }?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="lastname" class="col-4 col-form-label">Address</label>
                                            <div class="col-8">
                                                <input id="lastname" disabled value=" <?php if (!empty(auth()->user()->address)) {
                                                        echo auth()->user()->address;
                                                    }?> " class="form-control here" type="text">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                        </div>
                    </div>
                </div>


        </div>
    </div>
@endsection
