@extends('main')
@section('home1')
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/home.css" type="text/css" media="all">
    <link rel="stylesheet" href="/css/main.css" type="text/css" media="all">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/fontawesome.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/30.0.0/classic/ckeditor.js"></script>
    <title>COWELL E-learning</title>
</head>
<body>

    <div class="header header-bottom">
        <ul>
            <li><a href="">Giới thiệu</a></li>
            <li><a href="">Giáo viên</a></li>
            <li><a href="">Phòng thi</a></li>
            <li><a href="">Thư viện</a></li>
            <li><a href="">Hỗ trợ</a></li>
        </ul>
    </div>
    <div class="main-content">
        <div class=" menu">
            <ul>
                <li class="title-cate">
                    <p><i class="fas fa-bars"></i>  Các khóa học</p>
                </li>
                <li class="dropdown dropright">
                    <p data-toggle="dropdown">
                        <i class="fas fa-graduation-cap"></i> Đại học - Cao đẳng
                    </p>
                    <div class="dropdown-menu">
                        <p class="text-center">KHÓA HỌC</p>
                        <div class="course">
                            <a class="dropdown-item" href="#"><i class="fas fa-calculator"></i>  Toán Cao Cấp</a>
                            <a class="dropdown-item" href="#"><i class="fas fa-book"></i>  TOEIC</a>
                        </div>
                    </div>
                </li>
                <li class="dropdown dropright">
                    <p data-toggle="dropdown">
                        <i class="fas fa-graduation-cap"></i> Khóa học bổ trợ
                    </p>
                    <div class="dropdown-menu">
                        <p class="text-center">KHÓA HỌC</p>
                        <div class="course">
                            <a class="dropdown-item" href="#"><i class="fas fa-calculator"></i>  Toán</a>
                            <a class="dropdown-item" href="#"><i class="fas fa-book"></i>  Văn</a>
                            <a class="dropdown-item" href="#"><i class="fas fa-book"></i>  Tiếng Anh</a>
                        </div>

                    </div>
                </li>
                <li class="dropdown dropright">
                    <p data-toggle="dropdown">
                        <i class="fas fa-graduation-cap"></i> Bồi dưỡng học sinh giỏi
                    </p>
                    <div class="dropdown-menu" >
                        <p class="text-center">KHÓA HỌC</p>
                        <div class="course">
                            <a class="dropdown-item" href="#"><i class="fas fa-calculator"></i>  Toán</a>
                        </div>

                    </div>
                </li>
                <li class="dropdown dropright">
                    <p data-toggle="dropdown">
                        <i class="fas fa-graduation-cap"></i> Luyện thi đại học
                    </p>
                    <div class="dropdown-menu" >
                        <div class="DHBK">
                            <p class="text-center">LUYỆN THI ĐẠI HỌC BÁCH KHOA HÀ NỘI</p>
                            <div class="course">
                                <a class="dropdown-item" href="#">Tổng ôn toàn diện</a>
                                <a class="dropdown-item" href="#">Luyện đề thi đại học bách khoa hà nội</a>
                            </div>

                        </div>
                        <div class="DHQG">
                            <p class="text-center">LUYỆN THI ĐẠI HỌC QUỐC GIA HÀ NỘI</p>
                            <div class="course">
                                <a class="dropdown-item" href="#">Tổng ôn toàn diện</a>
                                <a class="dropdown-item" href="#">Luyện đề thi đại học quốc gia hà nội</a>
                            </div>
                        </div>
                        <div class="DH">
                            <p class="text-center">LUYỆN THI ĐẠI HỌC</p>
                            <div class="course">
                                <a class="dropdown-item" href="#">Tổng ôn toàn diện</a>
                                <a class="dropdown-item" href="#">Luyện đề thi đại học qua các năm</a>
                            </div>
                        </div>

                    </div>
                </li>
                <li class="dropdown dropright">
                    <p data-toggle="dropdown">
                        <i class="fas fa-graduation-cap"></i> Lớp 10 - Lớp 11 - Lớp 12
                    </p>
                    <div class="dropdown-menu" >
                        <div class="grade-10">
                            <p class="text-center">KHỐI 10</p>
                            <div class="course">
                                <a class="dropdown-item" href="#"><i class="fas fa-calculator"></i> Toán</a>
                                <a class="dropdown-item" href="#"><i class="fas fa-book"></i> Văn</a>
                                <a class="dropdown-item" href="#"><i class="fas fa-book"></i> Tiếng anh</a>
                                <a class="dropdown-item" href="#"><i class="fas fa-cogs"></i> Vật Lý</a>
                                <a class="dropdown-item" href="#"><i class="fas fa-filter"></i> Hóa Học</a>
                                <a class="dropdown-item" href="#"><i class="fas fa-search"></i> Sinh Học</a>
                            </div>

                        </div>
                        <div class="grade-11">
                            <p class="text-center">KHỐI 11</p>
                            <div class="course">
                                <a class="dropdown-item" href="#"><i class="fas fa-calculator"></i> Toán</a>
                                <a class="dropdown-item" href="#"><i class="fas fa-book"></i> Văn</a>
                                <a class="dropdown-item" href="#"><i class="fas fa-book"></i> Tiếng anh</a>
                                <a class="dropdown-item" href="#"><i class="fas fa-cogs"></i> Vật Lý</a>
                                <a class="dropdown-item" href="#"><i class="fas fa-filter"></i> Hóa Học</a>
                                <a class="dropdown-item" href="#"><i class="fas fa-search"></i> Sinh Học</a>
                            </div>
                        </div>
                        <div class="grade-12">
                            <p class="text-center">KHỐI 12</p>
                            <div class="course">
                                <a class="dropdown-item" href="#"><i class="fas fa-calculator"></i> Toán</a>
                                <a class="dropdown-item" href="#"><i class="fas fa-book"></i> Văn</a>
                                <a class="dropdown-item" href="#"><i class="fas fa-book"></i> Tiếng anh</a>
                                <a class="dropdown-item" href="#"><i class="fas fa-cogs"></i> Vật Lý</a>
                                <a class="dropdown-item" href="#"><i class="fas fa-filter"></i> Hóa Học</a>
                                <a class="dropdown-item" href="#"><i class="fas fa-search"></i> Sinh Học</a>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="dropdown dropright">
                    <p data-toggle="dropdown">
                        <i class="fas fa-graduation-cap"></i> Luyện thi vào 10
                    </p>
                    <div class="dropdown-menu">
                        <div class="grade-10">
                            <p class="text-center">Tổng ôn</p>
                            <div class="course">
                                <a class="dropdown-item" href="#"><i class="fas fa-calculator"></i> Toán</a>
                                <a class="dropdown-item" href="#"><i class="fas fa-book"></i> Văn</a>
                                <a class="dropdown-item" href="#"><i class="fas fa-book"></i> Tiếng anh</a>
                                <a class="dropdown-item" href="#"><i class="fas fa-cogs"></i> Vật Lý</a>
                                <a class="dropdown-item" href="#"><i class="fas fa-filter"></i> Hóa Học</a>
                                <a class="dropdown-item" href="#"><i class="fas fa-search"></i> Sinh Học</a>
                            </div>
                        </div>
                        <div class="grade-10">
                            <p class="text-center">Luyện đề</p>
                            <div class="course">
                                <a class="dropdown-item" href="#"><i class="fas fa-calculator"></i> Toán</a>
                                <a class="dropdown-item" href="#"><i class="fas fa-book"></i> Văn</a>
                                <a class="dropdown-item" href="#"><i class="fas fa-book"></i> Tiếng anh</a>
                                <a class="dropdown-item" href="#"><i class="fas fa-cogs"></i> Vật Lý</a>
                                <a class="dropdown-item" href="#"><i class="fas fa-filter"></i> Hóa Học</a>
                                <a class="dropdown-item" href="#"><i class="fas fa-search"></i> Sinh Học</a>
                            </div>
                        </div>
                        <div class="grade-10">
                            <p class="text-center">Cấp Tốc</p>
                            <div class="course">
                                <a class="dropdown-item" href="#"><i class="fas fa-calculator"></i> Toán</a>
                                <a class="dropdown-item" href="#"><i class="fas fa-book"></i> Văn</a>
                                <a class="dropdown-item" href="#"><i class="fas fa-book"></i> Tiếng anh</a>
                                <a class="dropdown-item" href="#"><i class="fas fa-cogs"></i> Vật Lý</a>
                                <a class="dropdown-item" href="#"><i class="fas fa-filter"></i> Hóa Học</a>
                                <a class="dropdown-item" href="#"><i class="fas fa-search"></i> Sinh Học</a>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="dropdown dropright">
                    <p data-toggle="dropdown">
                        <i class="fas fa-graduation-cap"></i> Lớp 6 - Lớp 7 - Lớp 8 - Lớp 9
                    </p>
                    <div class="dropdown-menu" >
                        <div class="grade-6">
                            <p class="text-center">Khối 6</p>
                            <div class="course">
                                <a class="dropdown-item" href="#"><i class="fas fa-calculator"></i> Toán</a>
                                <a class="dropdown-item" href="#"><i class="fas fa-book"></i> Văn</a>
                                <a class="dropdown-item" href="#"><i class="fas fa-book"></i> Tiếng anh</a>
                                <a class="dropdown-item" href="#"><i class="fas fa-cogs"></i> Vật Lý</a>
                                <a class="dropdown-item" href="#"><i class="fas fa-search"></i> Sinh Học</a>
                            </div>
                        </div>
                        <div class="grade-7">
                            <p class="text-center">Khối 7</p>
                            <div class="course">
                                <a class="dropdown-item" href="#"><i class="fas fa-calculator"></i> Toán</a>
                                <a class="dropdown-item" href="#"><i class="fas fa-book"></i> Văn</a>
                                <a class="dropdown-item" href="#"><i class="fas fa-book"></i> Tiếng anh</a>
                                <a class="dropdown-item" href="#"><i class="fas fa-cogs"></i> Vật Lý</a>
                                <a class="dropdown-item" href="#"><i class="fas fa-search"></i> Sinh Học</a>
                            </div>
                        </div>
                        <div class="grade-8">
                            <p class="text-center">Khối 8</p>
                            <div class="course">
                                <a class="dropdown-item" href="#"><i class="fas fa-calculator"></i> Toán</a>
                                <a class="dropdown-item" href="#"><i class="fas fa-book"></i> Văn</a>
                                <a class="dropdown-item" href="#"><i class="fas fa-book"></i> Tiếng anh</a>
                                <a class="dropdown-item" href="#"><i class="fas fa-cogs"></i> Vật Lý</a>
                                <a class="dropdown-item" href="#"><i class="fas fa-filter"></i> Hóa Học</a>
                                <a class="dropdown-item" href="#"><i class="fas fa-search"></i> Sinh Học</a>
                            </div>
                        </div>
                        <div class="grade-9">
                            <p class="text-center">Khối 9</p>
                            <div class="course">
                                <a class="dropdown-item" href="#"><i class="fas fa-calculator"></i> Toán</a>
                                <a class="dropdown-item" href="#"><i class="fas fa-book"></i> Văn</a>
                                <a class="dropdown-item" href="#"><i class="fas fa-book"></i> Tiếng anh</a>
                                <a class="dropdown-item" href="#"><i class="fas fa-cogs"></i> Vật Lý</a>
                                <a class="dropdown-item" href="#"><i class="fas fa-filter"></i> Hóa Học</a>
                                <a class="dropdown-item" href="#"><i class="fas fa-search"></i> Sinh Học</a>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="dropdown dropright">
                    <p data-toggle="dropdown">
                        <i class="fas fa-graduation-cap"></i> Luyện thi vào 6
                    </p>
                    <div class="dropdown-menu" >
                        <div class="grade-6">
                            <p class="text-center">Tổng ôn</p>
                            <div class="course">
                                <a class="dropdown-item" href="#"><i class="fas fa-calculator"></i> Toán</a>
                                <a class="dropdown-item" href="#"><i class="fas fa-book"></i> Văn</a>
                                <a class="dropdown-item" href="#"><i class="fas fa-book"></i> Tiếng anh</a>
                            </div>

                        </div>
                        <div class="grade-6">
                            <p class="text-center">Luyện đề</p>
                            <div class="course">
                                <a class="dropdown-item" href="#"><i class="fas fa-calculator"></i> Toán</a>
                                <a class="dropdown-item" href="#"><i class="fas fa-book"></i> Văn</a>
                                <a class="dropdown-item" href="#"><i class="fas fa-book"></i> Tiếng anh</a>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="dropdown dropright">
                    <p data-toggle="dropdown">
                        <i class="fas fa-graduation-cap"></i> Lớp 1 - Lớp 2 - Lớp 3 - Lớp 4 - Lớp 5
                    </p>
                    <div class="dropdown-menu" >
                        <div class="grade-1">
                            <p class="text-center">Khối 1</p>
                            <div class="course">
                                <a class="dropdown-item" href="#"><i class="fas fa-calculator"></i> Toán</a>
                                <a class="dropdown-item" href="#"><i class="fas fa-book"></i> Văn</a>
                            </div>

                        </div>
                        <div class="grade-2">
                            <p class="text-center">Khối 2</p>
                            <div class="course">
                                <a class="dropdown-item" href="#"><i class="fas fa-calculator"></i> Toán</a>
                                <a class="dropdown-item" href="#"><i class="fas fa-book"></i> Văn</a>
                            </div>

                        </div>
                        <div class="grade-3">
                            <p class="text-center">Khối 3</p>
                            <div class="course">
                                <a class="dropdown-item" href="#"><i class="fas fa-calculator"></i> Toán</a>
                                <a class="dropdown-item" href="#"><i class="fas fa-book"></i> Văn</a>
                                <a class="dropdown-item" href="#"><i class="fas fa-book"></i> Tiếng anh</a>
                            </div>

                        </div>
                        <div class="grade-4">
                            <p class="text-center">Khối 4</p>
                            <div class="course">
                                <a class="dropdown-item" href="#"><i class="fas fa-calculator"></i> Toán</a>
                                <a class="dropdown-item" href="#"><i class="fas fa-book"></i> Văn</a>
                                <a class="dropdown-item" href="#"><i class="fas fa-book"></i> Tiếng anh</a>
                            </div>

                        </div>
                        <div class="grade-5">
                            <p class="text-center">Khối 5</p>
                            <div class="course">
                                <a class="dropdown-item" href="#"><i class="fas fa-calculator"></i> Toán</a>
                                <a class="dropdown-item" href="#"><i class="fas fa-book"></i> Văn</a>
                                <a class="dropdown-item" href="#"><i class="fas fa-book"></i> Tiếng anh</a>
                            </div>

                        </div>
                    </div>
                </li>
                <li class="dropdown dropright">
                    <p data-toggle="dropdown">
                        <i class="fas fa-graduation-cap"></i> Tiền tiểu học
                    </p>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="#">Tiền tiểu học</a>
                    </div>
                </li>
            </ul>
        </div>
        <div class=" slide-show">
            <div id="carousel-example-1z" class="carousel slide carousel-fade" data-ride="carousel">
                <!--Indicators-->
                <ol class="carousel-indicators">
                    <li data-target="#carousel-example-1z" data-slide-to="0" class="active"></li>
                    <li data-target="#carousel-example-1z" data-slide-to="1"></li>
                    <li data-target="#carousel-example-1z" data-slide-to="2"></li>
                    <li data-target="#carousel-example-1z" data-slide-to="3"></li>
                    <li data-target="#carousel-example-1z" data-slide-to="4"></li>
                    <li data-target="#carousel-example-1z" data-slide-to="5"></li>
                    <li data-target="#carousel-example-1z" data-slide-to="6"></li>
                </ol>

                <div class="carousel-inner" role="listbox">
                    <div class="carousel-item active">
                        <img  src="/images/slide.png"
                              alt="First slide">
                    </div>
                    <div class="carousel-item">
                        <img src="/images/slide2.jpg"
                             alt="Second slide">
                    </div>
                    <div class="carousel-item">
                        <img src="/images/slide3.jpg"
                             alt="Third slide">
                    </div>
                    <div class="carousel-item">
                        <img src="/images/slide4.png"
                             alt="Four slide">
                    </div>
                    <div class="carousel-item">
                        <img src="/images/slide6.jpg"
                             alt="Five slide">
                    </div>
                    <div class="carousel-item">
                        <img src="/images/slide7.png"
                             alt="Six slide">
                    </div>
                </div>

                <a class="carousel-control-prev" href="#carousel-example-1z" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carousel-example-1z" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
        <div class="content-right">
            <img src="/images/nen.jpg" alt="content-right" style="width: 100%">
            <img src="/images/nen1.jpg" alt="content-right" style="width: 100%">
        </div>
    </div>
    <div class="communication">
        <img src="/images/nen2.jpg" alt="">
    </div>
    <div class="content">
        <div class="content-child high-school">
            <div class="title">
                <a href="">Trung học phổ thông</a>
            </div>
            <div class="had-animations">
                <div class="advertisement">
                    <img src="/images/slide1.png" alt="advertisement">
                </div>
                <div class="list_course slide-show">
                                                                <div class="items carousel slide carousel-fade">
                            <img src="/images/1636384635.png"   alt="">
                            <p class="titles">GPPEN Vật lý</p>
                            <p class="lesson">
                                <span class="icon"><i class="fas fa-play-circle"></i></span>
                                <span class="number">3</span>
                                <span class="text">Bài giảng</span>
                            </p>
                            <a href="{{ route('course.view', 1) }}">Tìm hiểu thêm</a>
                        </div>
                                            <div class="items carousel slide carousel-fade">
                            <img src="/images/1636384635.png"   alt="">
                            <p class="titles">PEN-C HÓA HỌC</p>
                            <p class="lesson">
                                <span class="icon"><i class="fas fa-play-circle"></i></span>
                                <span class="number">3</span>
                                <span class="text">Bài giảng</span>
                            </p>
                            <a href="{{ route('course.view', 2) }}">Tìm hiểu thêm</a>
                        </div>
                                            <div class="items carousel slide carousel-fade">
                            <img src="/images/1636385032.jpg"   alt="">
                            <p class="titles">PEN-C TOÁN</p>
                            <p class="lesson">
                                <span class="icon"><i class="fas fa-play-circle"></i></span>
                                <span class="number">3</span>
                                <span class="text">Bài giảng</span>
                            </p>
                            <a href="{{ route('course.view', 4) }}">Tìm hiểu thêm</a>
                        </div>
                                    </div>
            </div>
            <div class="non-had-animations">
                <div class="list_course">
                                                                <div class="items">
                            <img src="/images/1636384635.png" alt="">
                            <p class="titles">GPPEN Vật lý</p>
                            <p class="lesson">
                                <span class="icon"><i class="fas fa-play-circle"></i></span>
                                <span class="number">3</span>
                                <span class="text">Bài giảng</span>
                            </p>

                            <a href="{{ route('course.view', 1) }}">Tìm hiểu thêm</a>
                        </div>
                                            <div class="items">
                            <img src="/images/1636384635.png" alt="">
                            <p class="titles">PEN-C HÓA HỌC</p>
                            <p class="lesson">
                                <span class="icon"><i class="fas fa-play-circle"></i></span>
                                <span class="number">3</span>
                                <span class="text">Bài giảng</span>
                            </p>

                            <a href="{{ route('course.view', 2) }}">Tìm hiểu thêm</a>
                        </div>
                                            <div class="items">
                            <img src="/images/1636385032.jpg" alt="">
                            <p class="titles">PEN-C TOÁN</p>
                            <p class="lesson">
                                <span class="icon"><i class="fas fa-play-circle"></i></span>
                                <span class="number">3</span>
                                <span class="text">Bài giảng</span>
                            </p>

                            <a href="{{ route('course.view', 4) }}">Tìm hiểu thêm</a>
                        </div>
                                            <div class="items">
                            <img src="/images/1636384987.jpg" alt="">
                            <p class="titles">PEN-C TIẾNG ANH</p>
                            <p class="lesson">
                                <span class="icon"><i class="fas fa-play-circle"></i></span>
                                <span class="number">3</span>
                                <span class="text">Bài giảng</span>
                            </p>

                            <a href="{{ route('course.view', 3) }}">Tìm hiểu thêm</a>
                        </div>
                                            <div class="items">
                            <img src="/images/1636385085.jpg" alt="">
                            <p class="titles">PEN-C Văn</p>
                            <p class="lesson">
                                <span class="icon"><i class="fas fa-play-circle"></i></span>
                                <span class="number">3</span>
                                <span class="text">Bài giảng</span>
                            </p>

                            <a href="{{ route('course.view', 5) }}">Tìm hiểu thêm</a>
                        </div>
                                    </div>
            </div>
        </div>
        <div class="content-child secondary-school">
            <div class="title">
                <a href="">Trung học cơ sở</a>
            </div>
            <div class="had-animations">
                <div class="advertisement">
                    <img src="/images/slide4.png" alt=advertisement"">
                </div>
                <div class="list_course slide-show">
                                                                <div class="items carousel slide carousel-fade">
                            <img src="/images/1636384635.png"   alt="">
                            <p class="titles">GPPEN Vật lý</p>
                            <p class="lesson">
                                <span class="icon"><i class="fas fa-play-circle"></i></span>
                                <span class="number">4</span>
                                <span class="text">Bài giảng</span>
                            </p>

                            <a href="{{ route('course.view', 1) }}">Tìm hiểu thêm</a>
                        </div>
                                            <div class="items carousel slide carousel-fade">
                            <img src="/images/1636384635.png"   alt="">
                            <p class="titles">PEN-C HÓA HỌC</p>
                            <p class="lesson">
                                <span class="icon"><i class="fas fa-play-circle"></i></span>
                                <span class="number">3</span>
                                <span class="text">Bài giảng</span>
                            </p>

                            <a href="{{ route('course.view', 2) }}">Tìm hiểu thêm</a>
                        </div>
                                            <div class="items carousel slide carousel-fade">
                            <img src="/images/1636385032.jpg"   alt="">
                            <p class="titles">PEN-C TOÁN</p>
                            <p class="lesson">
                                <span class="icon"><i class="fas fa-play-circle"></i></span>
                                <span class="number">3</span>
                                <span class="text">Bài giảng</span>
                            </p>

                            <a href="{{ route('course.view', 4) }}">Tìm hiểu thêm</a>
                        </div>
                                    </div>
            </div>
            <div class="non-had-animations">
                <div class="list_course">
                                                                <div class="items">
                            <img src="/images/1636384635.png" alt="">
                            <p class="titles">GPPEN Vật lý</p>
                            <p class="lesson">
                                <span class="icon"><i class="fas fa-play-circle"></i></span>
                                <span class="number">4</span>
                                <span class="text">Bài giảng</span>
                            </p>

                            <a href="{{ route('course.view', 1) }}">Tìm hiểu thêm</a>
                        </div>
                                            <div class="items">
                            <img src="/images/1636384635.png" alt="">
                            <p class="titles">PEN-C HÓA HỌC</p>
                            <p class="lesson">
                                <span class="icon"><i class="fas fa-play-circle"></i></span>
                                <span class="number">3</span>
                                <span class="text">Bài giảng</span>
                            </p>

                            <a href="{{ route('course.view', 2) }}">Tìm hiểu thêm</a>
                        </div>
                                            <div class="items">
                            <img src="/images/1636385032.jpg" alt="">
                            <p class="titles">PEN-C TOÁN</p>
                            <p class="lesson">
                                <span class="icon"><i class="fas fa-play-circle"></i></span>
                                <span class="number">3</span>
                                <span class="text">Bài giảng</span>
                            </p>

                            <a href="{{ route('course.view', 4) }}">Tìm hiểu thêm</a>
                        </div>
                                            <div class="items">
                            <img src="/images/1636384987.jpg" alt="">
                            <p class="titles">PEN-C TIẾNG ANH</p>
                            <p class="lesson">
                                <span class="icon"><i class="fas fa-play-circle"></i></span>
                                <span class="number">3</span>
                                <span class="text">Bài giảng</span>
                            </p>

                            <a href="{{ route('course.view', 3) }}">Tìm hiểu thêm</a>
                        </div>
                                            <div class="items">
                            <img src="/images/1636385085.jpg" alt="">
                            <p class="titles">PEN-C Văn</p>
                            <p class="lesson">
                                <span class="icon"><i class="fas fa-play-circle"></i></span>
                                <span class="number">3</span>
                                <span class="text">Bài giảng</span>
                            </p>

                            <a href="">Tìm hiểu thêm</a>
                        </div>
                                    </div>
            </div>
        </div>
        <div class="content-child primary-school">
            <div class="content-child primary-school">
                <div class="title">
                    <a href="">Tiểu học</a>
                </div>
                <div class="had-animations">
                    <div class="advertisement">
                        <img src="/images/tieuhoc.gif" alt="advertisement">
                    </div>
                    <div class="list_course slide-show">
                                                                            <div class="items carousel slide carousel-fade">
                                <img src="/images/1636384635.png"   alt="">
                                <p class="titles">GPPEN Vật lý</p>
                                <p class="lesson">
                                    <span class="icon"><i class="fas fa-play-circle"></i></span>
                                    <span class="number">4</span>
                                    <span class="text">Bài giảng</span>
                                </p>

                                <a href="">Tìm hiểu thêm</a>
                            </div>
                                                    <div class="items carousel slide carousel-fade">
                                <img src="/images/1636384635.png"   alt="">
                                <p class="titles">PEN-C HÓA HỌC</p>
                                <p class="lesson">
                                    <span class="icon"><i class="fas fa-play-circle"></i></span>
                                    <span class="number">3</span>
                                    <span class="text">Bài giảng</span>
                                </p>

                                <a href="">Tìm hiểu thêm</a>
                            </div>
                                                    <div class="items carousel slide carousel-fade">
                                <img src="/images/1636385032.jpg"   alt="">
                                <p class="titles">PEN-C TOÁN</p>
                                <p class="lesson">
                                    <span class="icon"><i class="fas fa-play-circle"></i></span>
                                    <span class="number">3</span>
                                    <span class="text">Bài giảng</span>
                                </p>

                                <a href="">Tìm hiểu thêm</a>
                            </div>
                                            </div>
                </div>
                <div class="non-had-animations">
                    <div class="list_course">
                                                                            <div class="items">
                                <img src="/images/1636384635.png" alt="">
                                <p class="titles">GPPEN Vật lý</p>
                                <p class="lesson">
                                    <span class="icon"><i class="fas fa-play-circle"></i></span>
                                    <span class="number">4</span>
                                    <span class="text">Bài giảng</span>
                                </p>

                                <a href="">Tìm hiểu thêm</a>
                            </div>
                                                    <div class="items">
                                <img src="/images/1636384635.png" alt="">
                                <p class="titles">PEN-C HÓA HỌC</p>
                                <p class="lesson">
                                    <span class="icon"><i class="fas fa-play-circle"></i></span>
                                    <span class="number">3</span>
                                    <span class="text">Bài giảng</span>
                                </p>

                                <a href="">Tìm hiểu thêm</a>
                            </div>
                                                    <div class="items">
                                <img src="/images/1636385032.jpg" alt="">
                                <p class="titles">PEN-C TOÁN</p>
                                <p class="lesson">
                                    <span class="icon"><i class="fas fa-play-circle"></i></span>
                                    <span class="number">3</span>
                                    <span class="text">Bài giảng</span>
                                </p>

                                <a href="">Tìm hiểu thêm</a>
                            </div>
                                                    <div class="items">
                                <img src="/images/1636384987.jpg" alt="">
                                <p class="titles">PEN-C TIẾNG ANH</p>
                                <p class="lesson">
                                    <span class="icon"><i class="fas fa-play-circle"></i></span>
                                    <span class="number">3</span>
                                    <span class="text">Bài giảng</span>
                                </p>

                                <a href="">Tìm hiểu thêm</a>
                            </div>
                                                    <div class="items">
                                <img src="/images/1636385085.jpg" alt="">
                                <p class="titles">PEN-C Văn</p>
                                <p class="lesson">
                                    <span class="icon"><i class="fas fa-play-circle"></i></span>
                                    <span class="number">3</span>
                                    <span class="text">Bài giảng</span>
                                </p>

                                <a href="">Tìm hiểu thêm</a>
                            </div>
                                            </div>
                </div>
            </div>
        </div>
    </div>
    <div class="fighting" style="margin: 0% 0%">
        <img src="/images/nen4.jpg" alt="">
    </div>

</body>
</html>
@stop
