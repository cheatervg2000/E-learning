@extends('main')



@section('profile_edit')
<link rel="stylesheet" href="/css/controll.css" type="text/css" media="all">
<link rel="stylesheet" href="{{ asset('admins/index.css') }}">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <div class="container" style="margin: 5% auto">
        <div class="home">
            <p>
                <a href="{{route('home')}}"><i class="fas fa-home"></i>Trang chủ ></a>
                <span>Cập Nhật Thông Tin</span>
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

        <form action="{{ route('profile.update', [auth()?->user()?->id]) }}" method="POST">
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <i>Chú ý: Các trường có <span style="color: red">*</span> không được để trống !</i>
                            </div>
                            @csrf
                            @method("PUT")
                            <div class="mb-3">
                                <label>Tên học viên <span style="color: red">*</span></label>
                                <input type="text"
                                    class="form-control @error('name') is-invalid @enderror"
                                    name="name" placeholder="Nhập tên học viên"
                                    value="{{ $student->name }}">
                                    @error('name')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                            </div>

                            <div class="mb-3">
                                <label>Số điện thoại <span style="color: red">*</span></label>
                                <input type="text" class="form-control @error('phone') is-invalid @enderror"
                                        name="phone" placeholder="Nhập số điện thoại"
                                        value="{{ $student->phone }}">
                                        @error('phone')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror

                            </div>

                            <div class="mb-3">
                                <label>Email</label>
                                <input type="text" class="form-control" disabled
                                        name="email" placeholder="Nhập email"
                                        value="{{ $student->email }}">

                            </div>

                            <div class="mb-3">
                                <label>Mật khẩu</label>
                                <input type="password" class="form-control"  disabled
                                        name="password" placeholder=""
                                        value="">

                            </div>

                            <div class="mb-3">
                                <label>Địa chỉ <span style="color: red">*</span></label>
                                <input type="text" class="form-control @error('address') is-invalid @enderror"
                                        name="address" placeholder="Nhập địa chỉ"
                                        value="{{ $student->address }}">
                                        @error('address')
                                            <div class="invalid-feedback invalid-font-size">{{ $message }}</div>
                                        @enderror
                            </div>

                            <div class="col-md-12">
                                <button type="submit" class="btn btn-success">Cập nhật</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

@endsection
