@extends('main')

@section('css')
    <style>
        .invalid-font-size{
            font-size: 100%;
        }
    </style>
@endsection 

@section('change_password')
    <link rel="stylesheet" href="/css/controll.css" type="text/css" media="all">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <div class="container" style="margin: 5% auto">
        <div class="home">
            <p>
                <a href="{{route('home')}}"><i class="fas fa-home"></i>Trang chủ</a>
                <span>Thay đổi mật khẩu</span>
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
                                <h4>Thay đổi mật khẩu</h4>
                                <hr>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <form action="{{route('profile.update_password')}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    {{-- @if(session('error'))
                                        <div class="alert alert-danger">
                                            {{session('error')}}
                                        </div>
                                    @endif
                                    @if(session('success'))
                                        <div class="alert alert-success">
                                            {{session('success')}}
                                        </div>
                                    @endif --}}
                                    <div class="input-group form-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-key"></i></span>
                                        </div>
                                        <input type="password" class="form-control" placeholder="Mật khẩu cũ" name="old_password">
                                        <span style="color: red">@error('old_password'){{$message}}@enderror</span>
                                        @error('address')
                                            <div class="invalid-feedback invalid-font-size">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="input-group form-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-key"></i></span>
                                        </div>
                                        <input type="password" class="form-control" placeholder="Mật khẩu mới" name="new_password">
                                        <span style="color: red">@error('new_password'){{$message}}@enderror</span>
                                        @error('new_password')
                                            <div class="invalid-feedback invalid-font-size">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="input-group form-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-key"></i></span>
                                        </div>
                                        <input type="password" class="form-control" placeholder="Xác nhận mật khẩu" name="confirm_password">
                                        <span style="color: red">@error('confirm_password'){{$message}}@enderror</span>
                                        @error('confirm_password')
                                            <div class="invalid-feedback invalid-font-size">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <div class="offset-4 col-8" style="margin-top:1% ">
                                            <button name="submit" type="submit" class="btn btn-primary">Đổi mật khẩu</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

@stop

