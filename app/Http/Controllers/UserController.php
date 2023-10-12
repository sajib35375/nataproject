<?php

namespace App\Http\Controllers;

use App\Models\Apply;
use App\Models\Director;
use App\Models\User;
use Illuminate\Http\Request;
use Auth;

class UserController extends Controller
{
    public function userProfile()
    {
        $user_data = User::find(Auth::id());
        return view('frontend.user.user_profile', compact('user_data'));
    }

    public function userProfileUpdate(Request $request)
    {
        $update_data = User::find(Auth::id());

        $unique_name = '';
        if ($request->hasFile('photo')) {
            $image = $request->file('photo');
            $unique_name = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            $image->move('img/uploads/user/', $unique_name);
        } else {
            $unique_name = $request->old_photo;
        }
        $update_data->name = $request->name;
        $update_data->email = $request->email;
        $update_data->phone = $request->phone;
        $update_data->photo = $unique_name;
        $update_data->update();

        return redirect()->back()->with('success', 'User Profile Updated Successfully');
    }

    public function changePassView(){
        return view('frontend.user.change_password');
    }

    public function changePass(Request $request){
        $this->validate($request,[
            'old_password' => 'required',
            'password' => 'required|confirmed',
        ]);

        $user_pass = Auth::user()->password;

        if (password_verify($request->old_password,$user_pass)){
            $password = User::find(Auth::id());
            $password->password = password_hash($request->password,PASSWORD_DEFAULT);
            $password->update();
        }
        return redirect()->back()->with('success','password update successfully');
    }


    public function userApply(){
        $app = Apply::where('user_id',Auth::id())->get();
        return view('frontend.user.user_certificate',compact('app'));
    }



    public function userApplySingle($id){
        $app_details = Apply::where('user_id',Auth::id())->where('id',$id)->first();
        return view('frontend.user.user_app_single',compact('app_details'));
    }


    public function dgInfo(){
        $dg = Director::find(1);
        return view('frontend.dg.dg',compact('dg'));
    }


    public function userApplicant(){
        $app = Apply::where('user_id',Auth::id())->get();
        return view('frontend.user.user_application',compact('app'));
    }





}