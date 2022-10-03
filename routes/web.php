<?php

use App\Http\Controllers\Admin\ClassroomController;
use App\Http\Controllers\Admin\StudentController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware("auth")->get('/', function () {
    return view('welcome');
});
Route::prefix("main")->name("main.")->group(function () {
    Route::get('/',  "App\Http\Controllers\MainController@index")->name('home');
});

Route::prefix("profile")->name("profile.")->group(function () {
    Route::get('/',  "App\Http\Controllers\Admin\ProfileController@index")->name('profile');
    Route::get('/change-password', "App\Http\Controllers\Admin\ProfileController@change_password")->name('change_password');
    Route::post('/update-password', "App\Http\Controllers\Admin\ProfileController@update_password")->name('update_password');
    Route::get('/history',  "App\Http\Controllers\Admin\HistoryController@getAll")->name('history');
    Route::get('/edit/{id}',  "App\Http\Controllers\Admin\ProfileController@edit")
    ->name('edit');

    Route::put('/update/{id}',  "App\Http\Controllers\Admin\ProfileController@update")
    ->name('update');
});

Auth::routes();

Route::post('login', 'App\Http\Controllers\Auth\LoginController@login');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix("admin")->middleware("auth")->group(function () {
    //classroom
    Route::prefix("classroom")->name("classroom.")->middleware('role.admin')->group(function () {
        Route::get('/', [ClassroomController::class, 'index'])
            ->name('index');

        Route::get('/create', [ClassroomController::class, 'create'])
            ->name('create');

        Route::post('/store',  [ClassroomController::class, 'store'])
            ->name('store');

        Route::get('/edit/{id}',  [ClassroomController::class, 'edit'])
            ->name('edit');

        Route::put('/update/{id}',  [ClassroomController::class, 'update'])
            ->name('update');

        Route::delete('/delete/{id}',  [ClassroomController::class, 'delete'])
            ->name('delete');

        Route::get('/search',  [ClassroomController::class, 'search'])
            ->name('search');

        Route::get('/show/{id}',  [ClassroomController::class, 'show'])
            ->name('show');

        Route::get('/add_student/{id}',  [ClassroomController::class, 'view_add_student'])
            ->name('view_add_student');

        Route::get('/add_student/{id}/{id_student}',  [ClassroomController::class, 'add_student'])
            ->name('add_student');

        Route::get('/remove_student/{id_classroom}/{id_student}',  [ClassroomController::class, 'remove_student'])
            ->name('remove.student');

        Route::get('/add_course/{id}',  [ClassroomController::class, 'view_add_course'])
            ->name('view_add_course');

        Route::get('/add_course/{id}/{id_course}',  [ClassroomController::class, 'add_course'])
            ->name('add_course');
        Route::get('/remove_course/{id_classroom}/{id_course}',  [ClassroomController::class, 'remove_course'])
            ->name('remove.course');
    });
    //course
    Route::prefix("course")->name("course.")->group(function () {
        Route::get('/create', [App\Http\Controllers\Admin\CourseController::class, 'create'])->middleware('role.admin')
            ->name("create");

        Route::post('/create', [App\Http\Controllers\Admin\CourseController::class, 'store'])->middleware('role.admin')
            ->name("store");

        Route::get('/update/{id}', [App\Http\Controllers\Admin\CourseController::class, 'edit'])->middleware('role.admin')
            ->name("edit");

        Route::put('/update/{id}', [App\Http\Controllers\Admin\CourseController::class, 'update'])->middleware('role.admin')
            ->name("update");

        Route::delete('/delete/{id}', [App\Http\Controllers\Admin\CourseController::class, 'delete'])->middleware('role.admin')
            ->name("delete");

        Route::get('/', [App\Http\Controllers\Admin\CourseController::class, 'index'])->middleware('role.admin')
            ->name('index');

        Route::get('/show/{id}',  [App\Http\Controllers\Admin\CourseController::class, 'show'])->middleware('role.admin')
            ->name('show');

        Route::get('/view/{id}',  [App\Http\Controllers\Admin\CourseController::class, 'view'])->name('view');

        Route::get('/search',  [App\Http\Controllers\Admin\CourseController::class, 'search'])->middleware('role.admin')->name('search');

        Route::get('/add_student/{id}',  [App\Http\Controllers\Admin\CourseController::class, 'view_add_student'])->middleware('role.admin')
            ->name('view_add_student');

        Route::get('/add_student/{id}/{id_student}',  [App\Http\Controllers\Admin\CourseController::class, 'add_student'])->middleware('role.admin')
            ->name('add_student');

        Route::get('/remove_student/{id_course}/{id_student}',  [App\Http\Controllers\Admin\CourseController::class, 'remove_student'])->middleware('role.admin')
            ->name('remove.student');

        Route::get('/add_test/{id}',  [App\Http\Controllers\Admin\CourseController::class, 'view_add_test'])->middleware('role.admin')
            ->name('view_add_test');

        Route::get('/add_test/{id}/{id_test}',  [App\Http\Controllers\Admin\CourseController::class, 'add_test'])->middleware('role.admin')
            ->name('add_test');
        Route::get('/remove_test/{id_course}/{id_test}',  [App\Http\Controllers\Admin\CourseController::class, 'remove_test'])->middleware('role.admin')
            ->name('remove.test');
    });
    //chapter
    Route::prefix("chapter")->name("chapter.")->group(function () {
        Route::get('/create/{course_id}', [App\Http\Controllers\Admin\ChapterController::class, 'create'])->middleware('role.admin')
            ->name("create");

        Route::post('/create', [App\Http\Controllers\Admin\ChapterController::class, 'store'])->middleware('role.admin')
            ->name("store");

        Route::get('/', [App\Http\Controllers\Admin\ChapterController::class, 'index'])->middleware('role.admin')
            ->name('index');

        Route::get('/show/{id}',  [App\Http\Controllers\Admin\ChapterController::class, 'show'])
            ->name('show');
    });
    //lesson
    Route::prefix("lesson")->name("lesson.")->group(function () {
        Route::get('/create/{chapter_id}', [App\Http\Controllers\Admin\LessonController::class, 'create'])
            ->name("create");

        Route::post('/create', [App\Http\Controllers\Admin\LessonController::class, 'store'])
            ->name("store");

        Route::get('/', [App\Http\Controllers\Admin\LessonController::class, 'index'])->name('index');

        Route::get('/upload/{id}', [App\Http\Controllers\Admin\LessonController::class, 'getVideo'])->name('upload');

        Route::post('/upload/{id}', [App\Http\Controllers\Admin\LessonController::class, 'uploadVideo'])->name('store2');

        Route::get('/view/{id}', [App\Http\Controllers\Admin\LessonController::class, 'view'])->name('view');
    });

    //student
    Route::prefix("student")->name("student.")->group(function () {
        Route::get('/',  "App\Http\Controllers\Admin\StudentController@index")
            ->name('index');

        Route::get('/create',  "App\Http\Controllers\Admin\StudentController@create")
            ->name('create');

        Route::post('/store',  "App\Http\Controllers\Admin\StudentController@store")
            ->name('store');

        Route::get('/edit/{id}',  "App\Http\Controllers\Admin\StudentController@edit")
            ->name('edit');

        Route::put('/update/{id}',  "App\Http\Controllers\Admin\StudentController@update")
            ->name('update');

        Route::delete('/delete/{id}',  "App\Http\Controllers\Admin\StudentController@delete")
            ->name('delete');

        Route::get('/show/{id}',  "App\Http\Controllers\Admin\StudentController@show")
            ->name('show');

        Route::get('/search',  "App\Http\Controllers\Admin\StudentController@search")
            ->name('search');

        Route::post('/uploadimg',  "App\Http\Controllers\Admin\StudentController@uploadimg")
            ->name('uploadimg');

    });
    //question
    Route::prefix("question")->name("question.")->middleware('role.admin')->group(function () {
        Route::get('/',  "App\Http\Controllers\Admin\QuestionController@index")
            ->name('index');

        Route::get('/create',  "App\Http\Controllers\Admin\QuestionController@create")
            ->name('create');

        Route::post('/store',  "App\Http\Controllers\Admin\QuestionController@store")
            ->name('store');

        Route::get('/edit/{id}',  "App\Http\Controllers\Admin\QuestionController@edit")
            ->name('edit');

        Route::put('/update/{id}',  "App\Http\Controllers\Admin\QuestionController@update")
            ->name('update');

        Route::delete('/delete/{id}',  "App\Http\Controllers\Admin\QuestionController@destroy")
            ->name('delete');

        Route::get('/download',  "App\Http\Controllers\Admin\QuestionController@downloadTemplate")
            ->name('download.template');

        Route::post('/import',  "App\Http\Controllers\Admin\QuestionController@importQuestions")
            ->name('import');

        Route::get('/search',  "App\Http\Controllers\Admin\QuestionController@search")
            ->name('search');
    });

    Route::prefix("test")->name("test.")->group(function () {
        Route::get('/create/{course_id}', [App\Http\Controllers\Admin\ChapterController::class, 'create'])
            ->name("create");

        Route::post('/create', [App\Http\Controllers\Admin\ChapterController::class, 'store'])
            ->name("store");

        Route::get('/', [App\Http\Controllers\Admin\ChapterController::class, 'index'])
            ->name('index');

        Route::get('/show/{id}',  [App\Http\Controllers\Admin\ChapterController::class, 'show'])
            ->name('show');
    });

    //test
    Route::prefix("testmanager")->name("testmanager.")->middleware('role.admin')->group(function () {
        Route::get('/',  "App\Http\Controllers\Admin\TestController@index")
            ->name('index');

        Route::get('/create',  "App\Http\Controllers\Admin\TestController@create")
            ->name('create');

        Route::post('/create',  "App\Http\Controllers\Admin\TestController@store")
            ->name('store');

        Route::get('/edit/{id}',  "App\Http\Controllers\Admin\TestController@edit")
            ->name('edit');

        Route::put('/update/{id}',  "App\Http\Controllers\Admin\TestController@update")
            ->name('update');

        Route::delete('/delete/{id}',  "App\Http\Controllers\Admin\TestController@delete")
            ->name('delete');

        Route::get('/show/{id}',  "App\Http\Controllers\Admin\TestController@show")
            ->name('show');

        Route::get('/search',  "App\Http\Controllers\Admin\TestController@search")
            ->name('search');

        Route::get('/add_question/{id}',  [App\Http\Controllers\Admin\TestController::class, 'view_add_question'])
            ->name('view_add_question');

        Route::get('/add_question/{id}/{id_question}',  [App\Http\Controllers\Admin\TestController::class, 'add_question'])
            ->name('add_question');

        Route::get('/remove_question/{id_test}/{id_question}',  [App\Http\Controllers\Admin\TestController::class, 'remove_question'])
            ->name('remove.question');
    });

    Route::prefix("test")->name("test.")->group(function () {
        Route::get('/create/{course_id}', [App\Http\Controllers\Admin\ChapterController::class, 'create'])->name("create");

        Route::post('/create', [App\Http\Controllers\Admin\ChapterController::class, 'store'])->name("store");

        Route::get('/', [App\Http\Controllers\Admin\ChapterController::class, 'index'])->name('index');

        Route::get('/show/{id}',  [App\Http\Controllers\Admin\ChapterController::class, 'show'])->name('show');
    });

    Route::prefix("quiz")->name("quiz.")->group(function () {
        Route::get('/lesson/{lesson_id}', [App\Http\Controllers\Admin\QuizController::class, 'show'])
            ->name("show");

        Route::post('/create', [App\Http\Controllers\Admin\QuizController::class, 'store'])
            ->name("store");

        Route::get('/lesson/{lesson_id}/create', [App\Http\Controllers\Admin\QuizController::class, 'create'])
            ->name('create');

        Route::get('/edit/{id}',  [App\Http\Controllers\Admin\QuizController::class, 'edit'])
            ->name('edit');

        Route::post('/edit/{id}', [App\Http\Controllers\Admin\QuizController::class, 'update'])
            ->name("update");

        Route::get('/delete/{id}', [App\Http\Controllers\Admin\QuizController::class, 'destroy'])
            ->name("destroy");

        Route::get('/lesson/{lesson_id}/test', [App\Http\Controllers\Admin\QuizController::class, 'test'])
            ->name("test");
        Route::post('/lesson/{lesson_id}/test', [App\Http\Controllers\Admin\QuizController::class, 'submitTestForm'])
            ->name("create-test");
        Route::post('/lesson/{lesson_id}/history', [App\Http\Controllers\Admin\QuizController::class, 'history'])
            ->name("history");
    });

});
Route::get('sendEmail/{id}', [StudentController::class, 'sendEmail'])->name('sendEmail');
