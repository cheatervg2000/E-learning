@extends('layouts.admin')
@section('title')
    <title>Xin chào</title>
@endsection
@section('content')
    <div class="content-wrapper">
        <div class="col-md-12">
            <h1 style="text-align: center; margin-top: 10px">
                Chào mừng <strong style="color: rgb(217, 44, 28)"><?php if (isset(auth()->user()->name)) {
                echo auth()->user()->name;
            }?></strong> đến mới trang quản lý.</h1>
            <img src="{{ asset('images/welcome.jpg') }}"
            style="width: 1250px; height: 500px;"
            class="mt-2">
        </div>
    </div>
@endsection
