<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CourseRequest;
use App\Mail\SendEmail;
use App\Models\Course;
use App\Models\Chapter;
use App\Models\Tests;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class CourseController extends Controller
{



    public function index()
    {
        $courses = Course::Where("status", 1)->latest()->paginate(10);
        return view('admin.courses.index', compact('courses'));
    }

    public function create()
    {
        return view('admin.courses.create');
    }

    public function store(CourseRequest $request)
    {
        $data = $request->all();
        Course::create($data);
        return redirect()->route('course.index');
    }

    public function edit($id)
    {
        $course = Course::findOrFail($id);
        return view('admin.courses.edit', compact('course'));
    }

    public function update(CourseRequest $request, $id)
    {
        DB::table('courses')
            ->where('id', '=', $request->id)
            ->update([
                'name' => $request->name,
                'description' => $request->description,
                'start_date' => $request->start_date,
                'end_date' => $request->end_date,

            ]);
        echo "success create Course";
        return redirect()->route('course.index');
    }

    public function delete($id)
    {
        $course = Course::find($id);
        $course->status = 0;
        $course->save();
        return redirect()->route('course.index');
    }

    public function show($id)
    {
        $id_course = $id;
        $course = Course::find($id);
        $chapters = DB::table('chapters')
            ->where('course_id', $id)
            ->Where("status", 1)->latest()->paginate(5);
        $students = $course->students;
        $tests = $course->tests;
        return view('admin.courses.show', compact(['course', 'chapters', 'students', 'id_course', 'tests']));

    }

    public function search(Request $request)
    {
        $courses = Course::where('status',1)
            -> where('name', 'Like', '%' .$request->name. '%')->paginate();
        $search = 1;
        return view("admin.courses.index", compact(['courses','search']));
    }

    public function view_add_student($id)
    {
        // dd($id);
        $course = Course::find($id);
        $arr = [];
        $students = User::Where("status", 1)->get();
        foreach ($students as $key => $value) {
            $courses = $value->courses;
            if (!empty($courses)) {
                $temp = 0;
                foreach ($courses as $c) {
                    if ($c->id == $id) {
                        $arr[] = 1;
                        $temp = 1;
                        // dd("x");
                        break;
                    }
                }
                if ($temp == 0) {
                    $arr[] = 0;
                }
            } else {
                $arr[] = 0;
            }
        }
        // dd($arr);
        return view("admin.courses.add_student", compact(["students", "id", "arr", 'course']));
    }

    public function add_student($id,$id_student) {
        $course = Course::find($id);
        $course->students()->attach($id_student);

        // $student = User::find($id_student);
        // $to_email = $student->email;
        // Mail::to($to_email)->send(new SendEmail);

        return redirect()->route("course.show", ["id"=>$id]);
    }

    public function remove_student($id_course, $id_student)
    {

        $course = Course::find($id_course);
        $course->students()->detach($id_student);
        return redirect()->route("course.show", ["id" => $id_course]);
    }

    public function view_add_test($id)
    {
        // dd($id);
        $course = Course::find($id);
        $arr = [];
        $tests = Tests::Where("status", 1)->get();
        foreach ($tests as $key => $value) {
            $courses = $value->courses;
            if (!empty($courses)) {
                $temp = 0;
                foreach ($courses as $c) {
                    if ($c->id == $id) {
                        $arr[] = 1;
                        $temp = 1;
                        // dd("x");
                        break;
                    }
                }
                if ($temp == 0) {
                    $arr[] = 0;
                }
            } else {
                $arr[] = 0;
            }
        }
        // dd($arr);
        return view("admin.courses.add_test", compact(["tests", "id", "arr", 'course']));
    }

    public function add_test($id, $id_test)
    {

        $course = Course::find($id);
        $course->tests()->attach($id_test);
        return redirect()->route("course.show", ["id" => $id]);
    }

    public function remove_test($id_course, $id_test)
    {

        $course = Course::find($id_course);
        $course->tests()->detach($id_test);
        return redirect()->route("course.show", ["id" => $id_course]);
    }

    public function view($id){
        $course = Course::find($id);
        $chapters = DB::table('chapters')
            ->where('chapters.course_id','=',$course->id)
            ->get()->sortBy('name')->all();
        return view('admin.courses.view',compact('course','chapters'));
    }
}
