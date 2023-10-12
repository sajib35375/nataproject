<?php

namespace App\Http\Controllers;

use App\Models\Apply;
use App\Models\Asession;
use App\Models\Course;
use App\Models\Prodistrict;
use App\Models\Prodivision;
use App\Models\Proupozila;
use App\Models\Sequence;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Image;

class ApplyFormController extends Controller
{
   public function showSession(){
       $course = Course::latest()->get();
       $asss = Asession::latest()->get();
       return view('admin.course.course_session',compact('course','asss'));
   }

   public function SessionAdd(Request $request){

       $unique_name = '';
       if ($request->hasFile('photo')){
           $image = $request->file('photo');
           $unique_name = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
           Image::make($image)->resize(150,50)->save('certificate/signature/'.$unique_name);

       }
       $unique_name_dg = '';
       if ($request->hasFile('dg_photo')){
           $image = $request->file('dg_photo');
           $unique_name_dg = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
           Image::make($image)->resize(150,50)->save('certificate/signature/'.$unique_name_dg);

       }

        $batch_id = Asession::insertGetId([
            'course_id' => $request->course_id,
            'session_name' => $request->session_name,
            'photo' => $unique_name,
            'dg_photo' => $unique_name_dg,
            'start' => $request->start,
            'end' => $request->end,
            'coor_text' => $request->coor_text,
            'memo' => $request->memo,
            'created_at' => Carbon::now(),
        ]);



       Session::put('session_id', [
           'ss_id' => $batch_id
       ]);

        return redirect()->back()->with('success','Batch Created successfully');


   }
   public function SessionGet($id){
       $data = Asession::where('course_id',$id)->where('status',true)->get();
       return json_encode($data);
   }

    public function ShowProDivision(){
       $pro_div = Prodivision::latest()->get();
       return view('admin.professional-info.division',compact('pro_div'));
    }

    public function StoreProDivision(Request $request){
       $this->validate($request,[
           'division' => 'required'
       ]);

       Prodivision::insert([
           'division_name' => $request->division,
           'created_at' => Carbon::now(),
       ]);

       return redirect()->back()->with('success','Division Added successfully');


    }
    public function editProDivision($id){
        $edit_pro_div = Prodivision::find($id);

        return view('admin.professional-info.edit_pro_div',compact('edit_pro_div'));
    }

    public function updateProDivision(Request $request,$id){
        $update_pro_div = Prodivision::find($id);
        $update_pro_div->division_name = $request->division_name;
        $update_pro_div->update();

        return redirect()->route('pro.div')->with('success','Division updated Successfully');
    }

    public function deleteProDivision($id){
        $delete_pro_div = Prodivision::find($id);
        $delete_pro_div->delete();
        return redirect()->back()->with('success','Division deleted Successfully');
    }


    public function ShowDistrict(){
       $district = Prodistrict::latest()->get();
       $division = Prodivision::latest()->get();
       return view('admin.professional-info.district',compact('district','division'));
    }

    public function StoreDistrict(Request $request){
       $this->validate($request,[
           'division_id' => 'required',
           'district_name' => 'required'
       ]);

       Prodistrict::insert([
           'division_id' => $request->division_id,
           'district_name' => $request->district_name,
           'created_at' => Carbon::now(),
       ]);

        return redirect()->back()->with('success','District Added successfully');

    }
    public function editProDistrict($id){
       $division = Prodivision::latest()->get();
       $edit_data = Prodistrict::find($id);
       return view('admin.professional-info.edit_pro_district',compact('edit_data','division'));
    }

    public function updateDistrict(Request $request,$id){
        $update_data = Prodistrict::find($id);
        $update_data->division_id = $request->division_id;
        $update_data->district_name = $request->district_name;
        $update_data->update();
        return redirect()->route('show.district')->with('success','District updated successfully');
    }
    public function deleteProDistrict($id){
        $delete_data = Prodistrict::find($id);
        $delete_data->delete();
        return redirect()->back()->with('success','District Deleted successfully');
    }


    public function ShowUpozila(){
       $upozila = Proupozila::latest()->get();
       $division = Prodivision::latest()->get();
       return view('admin.professional-info.upozila',compact('upozila','division'));
    }

    public function SelectUpozila($id){
       $upozila = Prodistrict::where('division_id',$id)->get();

       return json_encode($upozila);
    }

    public function StoreUpozila(Request $request){
        $this->validate($request,[
            'division_id' => 'required',
            'upozila_name' => 'required',
            'district_id' => 'required',
        ]);

        Proupozila::insert([
            'division_id' => $request->division_id,
            'district_id' => $request->district_id,
            'upozila_name' => $request->upozila_name,
            'created_at' => Carbon::now(),
        ]);

        return redirect()->back()->with('success','Upazila added successfully');

    }
    public function selectDistrict($id){
       $pro_dis = Prodistrict::where('division_id',$id)->get();
       return json_encode($pro_dis);
    }



    public function editUpozila($id){
       $edit_data = Proupozila::find($id);
       $division = Prodivision::latest()->get();
       $district = Prodistrict::latest()->get();
       return view('admin.professional-info.edit_upozila',compact('edit_data','division','district'));
    }

    public function updateProUpozila(Request $request,$id){
       $update_data = Proupozila::find($id);
       $update_data->division_id = $request->division_id;
       $update_data->district_id = $request->district_id;
       $update_data->upozila_name = $request->upozila_name;
       $update_data->updated_at = Carbon::now();
       $update_data->update();

       return redirect()->route('show.upozila')->with('success','upazila updated successfully');

    }
    public function deleteProUpozila($id){
       $delete_pro = Proupozila::find($id);
       $delete_pro->delete();

        return redirect()->back()->with('success','Upazila Deleted successfully');
    }

    public function SessionEdit($id){
       $edit_data = Asession::find($id);
       $course = Course::latest()->get();

       return view('admin.course.course_session_edit',compact('edit_data','course'));
    }

    public function SessionUpdate(Request $request,$id){
       $update_data = Asession::find($id);

        $unique_coor = '';
        if ($request->hasFile('photo')){
            $img = $request->file('photo');
            $unique_coor = hexdec(uniqid()).'.'.$img->getClientOriginalExtension();
            Image::make($img)->resize(150,80)->save('certificate/signature/'.$unique_coor);
            unlink('certificate/signature/'.$request->old_coor);
        }else{
            $unique_coor = $request->old_coor;
        }

        $unique_dg='';
        if ($request->hasFile('dg_photo')){
            $image = $request->file('dg_photo');
            $unique_dg = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(150,80)->save('certificate/signature/'.$unique_dg);
            unlink('certificate/signature/'.$request->old_dg);
        }else{
            $unique_dg = $request->old_dg;
        }



       $update_data->course_id = $request->course_id;
       $update_data->session_name = $request->session_name;
       $update_data->photo = $unique_coor;
       $update_data->dg_photo = $unique_dg;
       $update_data->start = $request->start;
       $update_data->end = $request->end;
       $update_data->coor_text = $request->coor_text;
       $update_data->memo = $request->memo;
       $update_data->updated_at = Carbon::now();
       $update_data->update();

        return redirect()->route('show.session')->with('success','Batch Updated successfully');
    }
    public function SessionDelete($id){
       $delete_data = Asession::find($id);
       $delete_data->delete();
       unlink('certificate/signature/'.$delete_data->photo);
       unlink('certificate/signature/'.$delete_data->dg_photo);

        return redirect()->back()->with('success','Batch Deleted successfully');
    }



}
