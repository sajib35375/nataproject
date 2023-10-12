<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Image;
use Auth;

class AdminUserController extends Controller
{
    public function adminUser(){
        $user = Admin::where('type',2)->latest()->get();
        return view('admin.user_role.user_role',compact('user'));
    }

    public function addAdminUser(){
        return view('admin.user_role.add_new_user');
    }

    public function storeAdminUser(Request $request){
        $this->validate($request,[
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'password' => 'required',
        ]);
        $unique_name = '';
        if ($request->hasFile('photo')){
            $image = $request->file('photo');
            $unique_name = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(255,255)->save('admin/img/'.$unique_name);
        }

        Admin::insert([
            'name' => $request->name,
            'email' => $request->email,
            'password' => password_hash($request->password,PASSWORD_DEFAULT),
            'phone' => $request->phone,
            'photo' => $unique_name,
            'slider' => $request->slider,
            'course' => $request->course,
            'pro_info' => $request->pro_info,
            'per_info' => $request->per_info,
            'batch' => $request->batch,
            'syllabus' => $request->syllabus,
            'participants' => $request->participants,
            'post' => $request->post,
            'certificate' => $request->certificate,
            'dormatory' => $request->dormatory,
            'admin_role' => $request->admin_role,
            'dg_info' => $request->dg_info,
            'type' => 2,
            'created_at' => Carbon::now(),
        ]);

        return redirect()->route('admin.user.role')->with('success','Admin User Inserted Successfully');
    }



    public function adminProfile(){
        $id = Auth::id();
        $profile = Admin::find($id);

        return view('admin.profile.admin_profile',compact('profile'));
    }

    public function adminProfileEdit(){
        $id = Auth::id();
        $edit = Admin::find($id);

        return view('admin.profile.profile_edit',compact('edit'));

    }

    public function adminProfileUpdate(Request $request){
        $id = Auth::id();
        $update_admin = Admin::find($id);

        $unique_name = '';
        if ($request->hasFile('photo')){
            $image = $request->file('photo');
            $unique_name = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(400,400)->save('admin/img/'.$unique_name);
        }else{
            $unique_name = $request->old_photo;
        }


        $update_admin->name = $request->name;
        $update_admin->email = $request->email;
        $update_admin->phone = $request->phone;
        $update_admin->photo = $unique_name;
        $update_admin->update();

        return redirect()->route('admin.profile')->with('success','Profile Updated Successfully');
    }

    public function showChangePassword(){
        return view('admin.profile.change_password');
    }


    public function adminChangePassword(Request $request){
        $this->validate($request,[
            'old_password' => 'required',
            'password' => 'required|confirmed',
        ]);
        $hash_pass = Auth::user()->password;
        if (password_verify($request->old_password,$hash_pass)){
            $pass_data = Admin::find(Auth::id());
            $pass_data->password = password_hash($request->password,PASSWORD_DEFAULT);
            $pass_data->update();

        }
        return redirect()->route('admin.dashboard')->with('success','password change successfully');
    }













}
