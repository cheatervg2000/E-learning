<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Question;
use App\Models\Tests;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\TestRequest;

class TestController extends Controller
{
    public function index()
    {
        $test = Tests::Where("status",1)->latest()->paginate(5);
        return view("admin.testmanager.index", compact('test'));
    }

    public function create()
    {
        return view("admin.testmanager.create");
    }

    
    public function store(TestRequest $request)
    {
        $data = $request->all();
        Tests::create($data);
        return redirect()->route('testmanager.index');
    }

    public function edit($id)
    {
        $test = Tests::find($id);
        return view('admin.testmanager.edit', compact('test'));
    }

    public function update(Request $request)
    {
        DB::table('tests')
        ->where('id','=',$request->id)
        ->update([
            'id'=>$request->id,
            'name'=>$request->name,
            'description'=>$request->description,
            'total_question'=>$request->total_question,
        ]);
        return redirect()->route('testmanager.index');
    }

    public function delete($id)
    {
        $test = Tests::find($id);
        $test->status = 0;
        $test->save();
        return redirect()->route('testmanager.index');
    }

    public function show($id)
    {
        $id_test = $id;
        $test = Tests::find($id);
        $questions = $test->questions;
        return view('admin.testmanager.show', compact(['test','questions','id_test']));
    }

    public function search(Request $request)
    {
        $test = [];
        if($request->name)
        {
            $test = Tests::where('status', 1)
            ->where('name', 'Like', '%' . $request->name . '%')->paginate();
        }
        if($request->description)
        {
            $test = Tests::where('status', 1)
            ->where('description', 'Like', '%' . $request->description . '%')->paginate();
        }
        if($request->name && $request->description)
        {
            $test = Tests::where('status', 1)
            ->where('name', 'Like', '%' . $request->name . '%')
            ->where('description', 'Like', '%' . $request->description . '%')->paginate();
        }
        $search = 1;
        return view("admin.testmanager.index", compact(['test','search']));
    }

    public function view_add_question($id) {
        // dd($id);
        $test =  Tests::find($id);
        $arr = [];
        $questions = Question::Where("status",1)->get();
        foreach( $questions as $key => $value) {
            $t = $value->tests;
            if(!empty($t)) {
                $temp = 0;
                foreach($t as $clr) {
                    if($clr->id == $id) {
                        $arr[] = 1;
                        $temp = 1;
                        // dd("x");
                        break;
                    }
                }
                if($temp ==0) {
                    $arr[] = 0;
                }
            } else {
                $arr[] = 0;
            }
        }
        // dd($arr);
        return view("admin.testmanager.add_question", compact(["questions","id","arr","test"]));
    }
    public function add_question($id,$id_question) {
        $test = Tests::find($id);
        if(count($test->questions) >= $test->total_question)
        {
            // thông báo bài test đã đủ số câu hỏi
        } else {
            $test->questions()->attach($id_question);
        }


        return redirect()->route("testmanager.show", ["id"=>$id]);
    }
    public function remove_question($id_test,$id_question) {

        $test = Tests::find($id_test);
        $test->questions()->detach($id_question);
        return redirect()->route("testmanager.show", ["id"=>$id_test]);
    }

}
