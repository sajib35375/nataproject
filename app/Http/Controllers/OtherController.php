<?php

namespace App\Http\Controllers;

use App\Models\Apply;
use App\Models\Asession;
use App\Models\Course;
use App\Models\Perdistrict;
use App\Models\Perdivision;
use App\Models\Perupozila;
use App\Models\Prodistrict;
use App\Models\Prodivision;
use App\Models\Proupozila;
use Illuminate\Http\Request;
use Image;

class OtherController extends Controller
{
    public function StatusInactive($id){
        $status_inactive = Asession::find($id);
        $status_inactive->status = false;
        $status_inactive->update();

        return redirect()->back()->with('success','status inactive successfully');
    }
    public function StatusActive($id){
        $status_active = Asession::find($id);
        $status_active->status = true;
        $status_active->update();

        return redirect()->back()->with('success','status active successfully');
    }
    public function editStudent($id){
        $edit_data = Apply::find($id);
        $courses = Course::all();
        $all_session = Asession::all();
        $division = Prodivision::all();
        $district = Prodistrict::all();
        $upozila = Proupozila::all();
        $perdivision = Perdivision::all();
        $perdistrict = Perdistrict::all();
        $perupozila = Perupozila::all();
        return view('admin.student-application.edit_student_form',compact('edit_data','perupozila','perdistrict','courses','division','perdivision','all_session','district','upozila'));
    }
    public function SelectSessionEdit($id){
        $session_data = Asession::where('course_id',$id)->get();
        return json_encode($session_data);
    }
    public function proDistrictEdit($id){
        $district = Prodistrict::where('division_id',$id)->get();
        return json_encode($district);
    }

    public function proUpozilatEdit($id){
        $upozila = Proupozila::where('district_id',$id)->get();
        return json_encode($upozila);
    }

    public function perDistrictEdit($id){
        $district = Perdistrict::where('division_id',$id)->get();
        return json_encode($district);
    }

    public function perUpozilaEdit($id){
        $upozila = Perupozila::where('district_id',$id)->get();
        return json_encode($upozila);
    }



    public function applyUpdate(Request $request,$id){
        $update_data = Apply::find($id);

        $unique_name='';
        if ($request->hasFile('photo')){
            $image = $request->file('photo');
            $unique_name = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(120,100)->save('NATA_files/image/'.$unique_name);
//            unlink('NATA_files/image/'.$request->old_photo);

        }else{
            $unique_name = $request->old_photo;
        }


        if ($request->organization_name=='Department of Agricultural Extension (DAE)'){
            $order = 1;
        }elseif ($request->organization_name=='Bangladesh Agricultural Research Council (BARC)'){
            $order=2;
        }elseif ($request->organization_name=='Bangladesh Agricultural Development Corporation (BADC)'){
            $order=3;
        }elseif ($request->organization_name=='Bangladesh Agricultural Research Institute (BARI)'){
            $order=4;
        }elseif ($request->organization_name=='Bangladesh Rice Research Institute (BRRI)'){
            $order=5;
        }elseif ($request->organization_name=='Bangladesh Institute of Nuclear Agriculture (BINA)'){
            $order=6;
        }elseif ($request->organization_name=='Bangladesh Sugarcrop Research Institute (BSRI)'){
            $order=7;
        }elseif ($request->organization_name=='Soil Resources Development Institute (SRDI)'){
            $order=8;
        }elseif ($request->organization_name=='Seed Certification Agency (SCA)'){
            $order=9;
        }elseif ($request->organization_name=='Barind Multipurpose Development Authority (BMDA)'){
            $order=10;
        }elseif ($request->organization_name=='Cotton Development Board (CDB)'){
            $order=11;
        }elseif ($request->organization_name=='Bangladesh Jute Research Institute (BJRI)'){
            $order=12;
        }elseif ($request->organization_name=='Agriculture Information Service (AIS)'){
            $order=13;
        }elseif ($request->organization_name=='Department of Agricultural Marketing (DAM)'){
            $order=14;
        }elseif ($request->organization_name=='Bangladesh Institute of Research and Training on Applied Nutrition (BIRTAN)'){
            $order=15;
        }elseif ($request->organization_name=='Bangladesh Wheat and Maize Research Institute (BWMRI)'){
            $order=16;
        }elseif ($request->organization_name=='National Agriculture Training Academy (NATA)'){
            $order=17;
        }elseif ($request->organization_name=='Directorate of Secondary and Higher Education'){
            $order=18;
        }else{
            $order=19;
        }


        $update_data->course_id = $request->course_id;
        $update_data->session_id = $request->session_id;
        $update_data->name_en = $request->name_en;
        $update_data->name_bn = $request->name_bn;
        $update_data->national_id = $request->national_id;
        $update_data->date_of_birth = $request->date_of_birth;
        $update_data->mobile = $request->mobile;
        $update_data->email = $request->email;
        $update_data->gender = $request->gender;
        $update_data->marital_status = $request->marital_status;
        $update_data->religion = $request->religion;
        $update_data->organization_name = $request->organization_name;
        $update_data->order = $order;
        $update_data->head_of_organization = $request->head_of_organization;
        $update_data->designation = $request->designation;
        $update_data->cadre_num = $request->cadre_number;
        $update_data->cadre_name = $request->cadre_name;
        $update_data->service_id = $request->service;
        $update_data->pay_grade = $request->pay;
        $update_data->controlling_officer = $request->controlling_off;
        $update_data->working_station = $request->working_station;
        $update_data->p_division = $request->division_id_per;
        $update_data->p_district = $request->district_id_per;
        $update_data->p_upozila = $request->upozila_id_per;
        $update_data->office_phone = $request->off_tele;
        $update_data->office_email = $request->off_email;
        $update_data->height = $request->height;
        $update_data->weight = $request->weight;
        $update_data->blood_group = $request->blood;
        $update_data->degree = $request->degree;
        $update_data->passing_year = $request->passing_year;
        $update_data->university = $request->university;
        $update_data->father_name = $request->father;
        $update_data->mother_name = $request->mother;
        $update_data->house_no = $request->house;
        $update_data->a_divisaion = $request->division;
        $update_data->b_district = $request->district;
        $update_data->c_upozila = $request->upozilla;
        $update_data->e_name = $request->name;
        $update_data->e_relation = $request->e_relation;
        $update_data->e_phone = $request->phone;
        $update_data->designation = $request->designation;
        $update_data->first_id = $request->first_id;
        $update_data->last_id = $request->last_id;
        $update_data->photo = $unique_name;
        $update_data->update();

        return redirect()->route('view.table')->with('success','Participant application Form updated successfully');
    }



    public function applyDelete($id){
        $delete_data = Apply::find($id);
        $delete_data->delete();
//        unlink('NATA_files/image/'.$delete_data->photo);

        return redirect()->back()->with('success','Participant application Form deleted successfully');
    }







}
