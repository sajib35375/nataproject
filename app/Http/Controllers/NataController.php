<?php

namespace App\Http\Controllers;

use App\Models\Apply;
use App\Models\Asession;
use App\Models\Course;
use App\Models\Perdistrict;
use App\Models\Perdivision;
use App\Models\Perupozila;
use App\Models\Prodivision;
use App\Models\Slider;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Auth;
use Image;

class NataController extends Controller
{
    public function check(){
        return view('frontend.auth.varification');
    }
    public function logout(){

            Auth::logout();
            return redirect()->route('login');

    }
    public function slider(){
        $data = Slider::latest()->get();
        return view('admin.slider.slider',compact('data'));
    }
    public function sliderStore(Request $request){

        if ($request->hasFile('photo')){
            $image = $request->file('photo');
            $unique_name = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(900,700)->save('NATA_files/image/'.$unique_name);

        }


        Slider::create([
            'photo' => $unique_name,
        ]);

        return redirect()->back()->with('success','slider inserted successfully');

    }

    public function sliderEdit($id){
        $edit_data = Slider::find($id);
        return view('admin.slider.slider_edit',compact('edit_data'));
    }

    public function sliderUpdate(Request $request,$id){
        $update_data = Slider::find($id);

        $unique_name = '';
        if ($request->hasFile('photo')){
            $image = $request->file('photo');
            $unique_name = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(900,700)->save('NATA_files/image/'.$unique_name);
//            unlink('NATA_files/image/'.$request->old_photo);
        }else{
            $unique_name = $request->old_photo;
        }

        $update_data->photo = $unique_name;
        $update_data->update();

        return redirect()->route('slider')->with('success','Slider updated successfully');
    }
    public function sliderDelete($id){
        $delete_data = Slider::find($id);
        $delete_data->delete();
//        unlink('NATA_files/image/'.$delete_data->photo);
        return redirect()->back()->with('success','Slider deleted successfully');
    }


    public function ShowIns(){
        return view('frontend.ApplyForm.instraction');
    }
    public function ApplyForm(){
        //        dd(Auth::id());
        $current = Carbon::now();

        $course = Course::latest()->get();
        $data = Asession::where('status',true)->get();
        $apply = Apply::where('user_id',Auth::id())->where('validity','>',$current)->get();
        $disable_courses_id = [];
        foreach($apply as $data){
            array_push($disable_courses_id,$data->course_id);
        }
        $division = Prodivision::latest()->get();
        $perdivision = Perdivision::latest()->get();

        return view('frontend.ApplyForm.applyform',compact('course','apply','disable_courses_id','data','division','perdivision'));
    }

    public function selectPerDistrict($id){
        $district = Perdistrict::where('division_id',$id)->get();

        return json_encode($district);
    }

    public function selectUpozila($id){
        $upozila = Perupozila::where('district_id',$id)->get();
        return json_encode($upozila);
    }









}
