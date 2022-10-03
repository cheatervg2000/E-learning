<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Chapter;
use App\Models\Lesson;
use Illuminate\Support\Facades\DB;

class ChapterController extends Controller
{
    public function create($course_id){

        return view('admin.chapters.create',[
            'course_id'=>$course_id
        ]);

    }

    public function store(Request $request){
        $data = $request->all();
        Chapter::create($data);

        return redirect()->route('course.show', $request->course_id);
    }

    public function index(){

        $chapters = Chapter::Where("status",1)->latest()->paginate(10);

        return view('admin.chapters.index', compact('chapters'));
    }
    public function show($id)
    {
        $chapters = Chapter::find($id);
        $lessons = DB::table('lessons')
        ->where('chapter_id','=',$id)
        ->get();
        $lessons = Lesson::Where('chapter_id','=',$id)->latest()->paginate(5);
        return view('admin.chapters.show', compact(['lessons','chapters']));
    }


}
