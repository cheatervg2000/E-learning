
<!-- <div class="content-wrapper">
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Create Course</h2>
    <form action="/courses/create" method="post">
        @csrf
        <label for="id">
            ID:
            <input type="text" name="id">
        </label><br><br>
        <label for="name">
            Name:
            <input type="text" name="name">
        </label><br><br>
        <label for="Description">
            Description:
            <input type="text" name="description">
        </label><br><br>
        <label for="Start_date">
            Start_date:
            <input type="date" name="start_date">
        </label><br><br>
        <label for="End_date">
            End_date:
            <input type="date" name="end_date">
        </label><br><br>

        <button type="submit">Create Course</button>
    </form>
</body>
</html>
</div>
 -->

@extends('layouts.admin')


@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        @include('partials.content-header', ['name' => 'COURSE', 'key' => 'CREATE'])
        <!-- /.content-header -->

        <!-- Main content -->

        <form action="/courses/create" method="POST">
            <div class="content">
                <div class="container-fluid">
                    <div class="column">
                        <div class="col-md-6">

                            @csrf
                            <div class="mb-3">
                            <label>id</label>
                                <input type="text"
                                    class="form-control @error('name') is-invalid @enderror"
                                    name="id" placeholder="Nhập ID"
                                    value="{{ old('id') }}">
                                 </div>

                            </div>

                            <div class="mb-3">
                                <label>Name</label>
                                <input type="text" class="form-control @error('phone') is-invalid @enderror"
                                        name="name" placeholder="Name input">



                            </div>

                            <div class="mb-3">
                                <label>Description</label>
                                <input type="text" class="form-control @error('email') is-invalid @enderror"
                                        name="description" placeholder="Nhập Description">


                            </div>

                            <div class="mb-3">
                                <label>start_date</label>
                                <input type="date"
                                        name="start_date">


                            </div>

                            <div class="mb-3">
                                <label>end_date</label>
                                <input type="date"
                                        name="end_date">
                            </div>
                            </div><br>

                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary">Create</button>
                            </div>
                        </div>
                    </div>
                    <!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
        </form>
        <!-- /.content -->
    </div>

@endsection

