@extends('layouts.admin')
@section('content')
    <div class="content-wrapper">
        <!DOCTYPE html>
        <html>

        <head>
            <title>UP LOAD VIDEO FOR LESSONS</title>
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
        </head>

        <body>
            <div class="container mt-5">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h2>UP LOAD VIDEO FOR LESSONS</h2>
                    </div>
                    <div class="panel-body">


                        <form action="{{ route('lesson.upload', ['id' => $lesson->id]) }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="row">

                                <div class="col-md-12">
                                    <div class="col-md-6 form-group">
                                        <label>Public:</label>
                                        <input type="text" name="public" class="form-control" />
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label>Select Video:</label>
                                        <input type="file" name="video" class="form-control" />
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <button type="submit" class="btn btn-success">Save</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </body>

        </html>
    </div>
@endsection
