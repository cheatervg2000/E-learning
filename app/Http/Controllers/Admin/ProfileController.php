<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Http\Requests\StudentRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use App\Http\Requests\UpdatePassword;



class ProfileController extends Controller
{
    public function index(){
        return view('profile.profile');
    }
    public function change_password(){
        return view('profile.change_passwd');
    }
    public function update_password(UpdatePassword $request){
        // $request->validate([
        //     'old_password' => ['required','min:6'],
        //     'new_password' => 'required|min:6',
        //     'confirm_password' => 'min:6|required_with:new_password|same:new_password',
        // ]);
       /* $current_user = auth()->user();
        if (Hash::check($request->old_password,$current_user->password)){
            $current_user->update([
                'password'=>bcrypt($request->new_password)
            ]);
            return redirect()->back()->with('success','Password successfully changed');
        }
        else{
            return redirect()->back()->with('error','old password does not matched.');
        }*/
        $password = Hash::make($request->new_password);
        User::find(auth()->user()->id)->update([

            'password' => $password,

        ]);
        return redirect()->route('main.home');
    }
    public function edit($id)
    {
        $student = User::find($id);
        return view("profile.edit", compact('student'));
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

}
