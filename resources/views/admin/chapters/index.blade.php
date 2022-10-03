@extends('layouts.admin')

@section('title')
    <title>Chương học</title>
@endsection

@section('content')
    <div class="content-wrapper">
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Chapters</title>
        </head>

        <body>
            <h2>List Chapters</h2>
            <a class="btn btn-primary" href="/admin/course" role="button">Back</a>
            <a class="btn btn-primary" href="/chapters/create" role="button">Create chapter</a>
            <a class="btn btn-primary" href="/lessons/create" role="button">Create lesson</a>
            <table border="1">
                <tr>
                    <td>ID</td>
                    <td>Course_ID</td>
                    <td>name</td>
                    <td>status</td>
                </tr>
                @foreach ($chapters as $chapter)
                    <tr>
                        <td>{{ $chapter->id }}</td>
                        <td>{{ $chapter->course_id }}</td>
                        <td>{{ $chapter->name }}</td>
                        <td>{{ $chapter->status }}</td>
                        <td>
                            <a href="/chapters/create">Create </a> <br>
                        <td>
                    </tr>
                @endforeach
            </table>
        </body>

        </html>
    </div>
@endsection
