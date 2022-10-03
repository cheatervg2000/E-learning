<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Chapter;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Lesson;
use Illuminate\Support\Facades\Storage;


class LessonController extends Controller
{
    public function create($chapter_id){
        return view('admin.lessons.create',['chapter_id' =>$chapter_id]);
    }

    public function store(Request $request){

        $data1 = $request->all();
        Lesson::create($data1);
        return redirect()->route('chapter.show', $request->chapter_id);
    }

    public function index(){
        $lessons = Lesson::Where("status",1)->latest()->paginate(10);
        $chapters = DB::table('chapters')
        ->get();



        return view('admin.lessons.index', compact(['lessons','chapters']));
    }
    public function getVideo($id)
    {
        $lesson = Lesson::find($id);

        return view('admin.lessons.upload', compact('lesson'));
    }

    public function uploadVideo(Request $request, $id)
   {

    $videoPath = null;
    if ($request->hasFile('video')) {

        $videoPath = $request->file('video')->storeAs(
            'videos',
            $request->id. '.' .$request->file('video')->getClientOriginalExtension(),
            'public',
        );
    }
    DB::table ('lessons')
    ->where('id','=',$id)
    ->update([
        'path_video' => $videoPath,
    ]);
    return redirect(route('lesson.index'));
}
public function view($id){

        $chapter = Chapter::find($id);
        $view = DB::table('lessons')
        ->where('lessons.chapter_id','=',$id)
        ->first();


        //First lấy ra giá trị đầu tiên tìm thấy
        $course = DB::table('courses')
            ->where('id','=',$chapter->course_id)
            ->first();

        //Lấy ra 1 mảng các giá trị tìm thấy
        $lessons = Lesson::where('lessons.chapter_id','=',$id)
            ->orderBy('name')->get();
        return view('admin.lessons.view',compact('lessons','course','chapter','view'));

}
}


// vong for co lay het dc nhu foreach k
// Dùng foreach cho nhanh, tôi nói chung là for thôi.
//ok tam hieu
