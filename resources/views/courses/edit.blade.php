@extends("layouts.admin")
@section("content")
<div class="content-wrapper">
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
    <form action="/courses/update/{{ $course->id }}" method="post">
        @csrf
        <label for="id">
            ID:
            <input type="text" name="ID" value="{{ $course->id }}">
        </label><br><br>
        <label for="Name">
            Name:
            <input type="text" name="name" value="{{ $course->name }}">
        </label><br><br>
        <label for="Description">
            Description:
            <input type="text" name="description" value="{{ $course->description }}">
        </label><br><br>
        <label for="Start_date">
            Start_date:
            <input type="date" name="start_date" value="{{ $course->start_date }}">
        </label><br><br>
        <label for="End_date">
            End_date:
            <input type="date" name="end_date" value="{{ $course->end_date }}">
        </label><br><br>
        <button type="submit">Edit course</button>
    </form>

</body>
</html>
</div>
@endsection
