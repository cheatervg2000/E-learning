<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ImgStudentRequest;
use App\Http\Requests\StudentRequest;
use App\Mail\SendEmail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use PhpOffice\PhpSpreadsheet\Calculation\Statistical\Distributions\StudentT;

class StudentController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('role.admin');
    }

    public function index()
    {
        $student = User::where('role_id',1)->where("status",1)->latest()->paginate(20);
        return view("admin.student.index", compact('student'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view("admin.student.add");
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  StudentRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StudentRequest $request)
    {
        $password = Hash::make($request->password);
        $user = User::create([
            'name' => $request->name ,
            'phone' => $request->phone,
            'email' => $request->email ,
            'password' => $password,
            'address' => $request->address,
        ]);
        $user->assignRole("student");
        return redirect()->route('student.index');
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \\Illuminate\View\View
     */
    public function edit($id)
    {
        $student = User::find($id);
        return view("admin.student.edit", compact('student'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  StudentRequest $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(StudentRequest $request, $id)
    {
        $password = Hash::make($request->password);
        User::find($id)->update([
            'name' => $request->name,
            'phone' => $request->phone,
            // 'email' => $request->email,
            'password' => $password,
            'address' => $request->address,
        ]);
        return redirect()->route('student.index');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($id)
    {
        // dd($id);
        $student = User::find($id);
        $student->status = 0;
        $student->save();
        return redirect()->route('student.index');
    }

    public function show($id)
    {
        $student = User::find($id);
        $classrooms = $student->classrooms;
        $courses = $student->courses;
        // dd($student);
        return view('admin.student.show', compact(['student','classrooms','courses']));
    }

    public function search(Request $request)
    {
        $student = [];
        if($request->name)
        {
            $student = User::role('student')->where('status',1)
                -> where('name', 'Like', '%' .$request->name. '%')->paginate();
        }
        if($request->address)
        {
            $student = User::role('student')->where('status',1)
                -> where('address', 'Like', '%' .$request->address. '%')->paginate();
        }
        if($request->phone)
        {
            $student = User::role('student')->where('status',1)
                -> where('phone', 'Like', '%' .$request->phone. '%')->paginate();
        }
        if($request->name && $request->phone)
        {
            $student = User::role('student')->where('status',1)
                -> where('name', 'Like', '%' .$request->name. '%')
                -> where('phone', 'Like', '%' .$request->phone. '%')->paginate();
        }
        if($request->name && $request->address)
        {
            $student = User::role('student')->where('status',1)
                -> where('name', 'Like', '%' .$request->name. '%')
                -> where('address', 'Like', '%' .$request->address. '%')->paginate();
        }
        if($request->phone && $request->address)
        {
            $student = User::role('student')->where('status',1)
                -> where('phone', 'Like', '%' .$request->phone. '%')
                -> where('address', 'Like', '%' .$request->address. '%')->paginate();
        }

        if($request->name && $request->phone && $request->address)
        {
            $student = User::role('student')->where('status',1)
                -> where('name', 'Like', '%' .$request->name. '%')
                -> where('phone', 'Like', '%' .$request->phone. '%')
                -> where('address', 'Like', '%' .$request->address. '%')->paginate();
        }

        $search = 1;
        return view("admin.student.index", compact(['student','search']));
    }

    public function uploadimg(ImgStudentRequest $request)
    {
        $file_image = $request->file('name_img');
        $path = Storage::putFile('public/images', $file_image);
        $name = Storage::url($path);

        $user = User::find($request['student_id']);
        $user->name_img = $name;
        $user->path = $path;
        $user->save();

        return redirect()->route('student.show', ['id'=>$request['student_id']]);
    }

}
