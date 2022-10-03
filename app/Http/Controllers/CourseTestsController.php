<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CourseTestsController extends Controller
{
    public function create_question($course_id){

            return view('course.tests.create_question',compact('course_id'));
       
        }
}
