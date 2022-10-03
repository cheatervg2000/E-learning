<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ClassroomRequest;
use App\Models\Classroom;
use App\Models\Course;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;

class ClassroomController extends Controller
{

    public function index()
    {
        $classrooms = Classroom::where('status', 1)->paginate();
        return view('admin.classroom.index', compact('classrooms'));
    }

    public function create()
    {
        return view('admin.classroom.create');
    }

    public function store(ClassroomRequest $request)
    {
        Classroom::create([
            'name' => $request->name,
            'description' => $request->description,
            'total_student' => $request->total_student,
        ]);
        return redirect()->route('classroom.index');
    }
    
    public function edit($id)
    {
        $classrooms = Classroom::find($id);
        return view("admin.classroom.edit", compact('classrooms'));
    }
    
    public function update(Request $request, $id)
    {
        Classroom::find($id)->update([
            'name' => $request->name,
            'description' => $request->description,
            'total_student' => $request->total_student,
        ]);
        return redirect()->route('classroom.index');
    }

    public function delete($id)
    {
        $classrooms = Classroom::find($id);
        $classrooms->status = 0;
        $classrooms->save();
        return redirect()->route('classroom.index');
    }

    public function search(Request $request)
    {
        $classrooms = [];
        if($request->name)
        {
            $classrooms = Classroom::where('status', 1)
            ->where('name', 'Like', '%' . $request->name . '%')->paginate();
        }
        if($request->description)
        {
            $classrooms = Classroom::where('status', 1)
            ->where('description', 'Like', '%' . $request->description . '%')->paginate();
        }
        if($request->name && $request->description)
        {
            $classrooms = Classroom::where('status', 1)
            ->where('name', 'Like', '%' . $request->name . '%')
            ->where('description', 'Like', '%' . $request->description . '%')->paginate();
        }
        
        $search = 1;
        return view("admin.classroom.index", compact(['classrooms','search']));
    }
    
    public function show($id)
    {
        $id_class = $id;
        $classroom = Classroom::find($id);
        $students = $classroom->students;
        $courses = $classroom->courses;
        return view("admin.classroom.detail", compact(["classroom", "id_class", "students", 'courses']));
    }

    public function view_add_student($id)
    {
        $arr = [];
        $students = User::Where("status", 1)->get();
        foreach ($students as $key => $value) {
            $clrs = $value->classrooms;
            if (!empty($clrs)) {
                $temp = 0;
                foreach ($clrs as $clr) {
                    if ($clr->id == $id) {
                        $arr[] = 1;
                        $temp = 1;
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
        return view("admin.classroom.add_student", compact(["students", "id", "arr"]));
    }

    public function add_student($id, $id_student)
    {

        $classroom = Classroom::find($id);
        $classroom->students()->attach($id_student);
        return redirect()->route("classroom.show", ["id" => $id]);
    }

    public function remove_student($id_classroom, $id_student)
    {

        $classroom = Classroom::find($id_classroom);
        $classroom->students()->detach($id_student);
        return redirect()->route("classroom.show", ["id" => $id_classroom]);
    }

    public function view_add_course($id)
    {
        $classroom =  Classroom::find($id);
        $arr = [];
        $courses = Course::Where("status", 1)->get();
        foreach ($courses as $key => $value) {
            $clrs = $value->classrooms;
            if (!empty($clrs)) {
                $temp = 0;
                foreach ($clrs as $clr) {
                    if ($clr->id == $id) {
                        $arr[] = 1;
                        $temp = 1;
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
        return view("admin.classroom.add_course", compact(["courses", "id", "arr", "classroom"]));
    }

    public function add_course($id, $id_course)
    {

        $classroom = Classroom::find($id);
        $classroom->courses()->attach($id_course);
        return redirect()->route("classroom.show", ["id" => $id]);
    }

    public function remove_course($id_classroom, $id_course)
    {

        $classroom = Classroom::find($id_classroom);
        $classroom->courses()->detach($id_course);
        return redirect()->route("classroom.show", ["id" => $id_classroom]);
    }
}
