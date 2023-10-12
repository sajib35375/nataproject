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
use App\Models\Sequence;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Auth;
use Illuminate\Support\Facades\Session;
use Image;

class CourseController extends Controller
{
    public function index(){
        $data = Course::latest()->get();
        return view('admin.course.course',compact('data'));
    }
    public function store(Request $request){

        $this->validate($request,[
            'course_name' => 'required',
        ]);


         Course::insert([
             'user_id' => '1',
             'course_name' => $request->course_name,
             'created_at' => Carbon::now(),
        ]);

        return redirect()->back()->with('success','course inserted successfully');

    }

    public function courseEdit($id){
        $course_edit = Course::find($id);
        return view('admin.course.course_edit',compact('course_edit'));
    }

    public function courseUpdate(Request $request,$id){
        $course_update = Course::find($id);
        $course_update->course_name = $request->course_name;
        $course_update->update();
        return redirect()->route('course.index')->with('success','course updated successfully');
    }

    public function courseDelete($id){
        $course_delete = Course::find($id);
        $course_delete->delete();

        return redirect()->back()->with('success','course deleted successfully');
    }

    public function frontView(){
        return view('frontend.ApplyForm.front_page');
    }

    public function WithoutInfo(){
        $course = Course::all();
        $current = Carbon::now();
        $apply = Apply::where('user_id',Auth::id())->where('validity','>',$current)->get();
        $disable_courses_id = [];
        foreach($apply as $data){
            array_push($disable_courses_id,$data->course_id);
        }

        $re_apply = Apply::where('user_id',Auth::id())->orderBy('id', 'desc')->first();

        $division = Prodivision::all();
        $district = Prodistrict::all();
        $upozila = Proupozila::all();
        $perdivision = Perdivision::all();
        $perdistrict = Perdistrict::all();
        $perupozila = Perupozila::all();

        return view('frontend.ApplyForm.old_data_apply',compact('division','perdivision','course','disable_courses_id','re_apply','district','upozila','perdistrict','perupozila'));
    }



    public function applyStore(Request $request){

        $this->validate($request,[
            'name_en' => 'required',
            'name_bn' => 'required',
            'course_id' => 'required',
            'session_id' => 'required',
            'nid' => 'required',
            'designation' => 'required',
            'working_station' => 'required',
            'organization' => 'required',



        ]);
        $unique_name='';
            if($request->hasFile('image')){
                $image = $request->file('image');
                $unique_name = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
                Image::make($image)->resize(120,100)->save('NATA_files/image/'.$unique_name);
            }else{
                $unique_name = $request->old_image;
            }


        $current = Carbon::now();
            if ($request->organization=='Department of Agricultural Extension (DAE)'){
                $order = 1;
            }elseif ($request->organization=='Bangladesh Agricultural Research Council (BARC)'){
                $order=2;
            }elseif ($request->organization=='Bangladesh Agricultural Development Corporation (BADC)'){
                $order=3;
            }elseif ($request->organization=='Bangladesh Agricultural Research Institute (BARI)'){
                $order=4;
            }elseif ($request->organization=='Bangladesh Rice Research Institute (BRRI)'){
                $order=5;
            }elseif ($request->organization=='Bangladesh Institute of Nuclear Agriculture (BINA)'){
                $order=6;
            }elseif ($request->organization=='Bangladesh Sugarcrop Research Institute (BSRI)'){
                $order=7;
            }elseif ($request->organization=='Soil Resources Development Institute (SRDI)'){
                $order=8;
            }elseif ($request->organization=='Seed Certification Agency (SCA)'){
                $order=9;
            }elseif ($request->organization=='Barind Multipurpose Development Authority (BMDA)'){
                $order=10;
            }elseif ($request->organization=='Cotton Development Board (CDB)'){
                $order=11;
            }elseif ($request->organization=='Bangladesh Jute Research Institute (BJRI)'){
                $order=12;
            }elseif ($request->organization=='Agriculture Information Service (AIS)'){
                $order=13;
            }elseif ($request->organization=='Department of Agricultural Marketing (DAM)'){
                $order=14;
            }elseif ($request->organization=='Bangladesh Institute of Research and Training on Applied Nutrition (BIRTAN)'){
                $order=15;
            }elseif ($request->organization=='Bangladesh Wheat and Maize Research Institute (BWMRI)'){
                $order=16;
            }elseif ($request->organization=='National Agriculture Training Academy (NATA)'){
                $order=17;
            }elseif ($request->organization=='Directorate of Secondary and Higher Education'){
                $order=18;
            }else{
                $order=19;
            }





           $id = Apply::insertGetId([
            'user_id' => Auth::id(),
            'course_id' => $request->course_id,
            'session_id' => $request->session_id,
            'name_en' => strtoupper($request->name_en),
            'name_bn' => $request->name_bn,
            'national_id' => $request->nid,
            'date_of_birth' => $request->dob,
            'mobile' => $request->mobile,
            'email' => $request->email,
            'gender' => $request->gender,
            'marital_status' => $request->marital_status,
            'religion' => $request->religion,
            'organization_name' => $request->organization,
            'order' => $order,
            'head_of_organization' => $request->head_of_org,
            'cadre_num' => $request->cadre,
            'cadre_name' => $request->cadre_name,
            'pay_grade' => $request->pay_grade,
            'designation' => $request->designation,
            'service_id' => $request->service_id,
            'controlling_officer' => $request->controlling_officer,
            'working_station' => $request->working_station,
            'p_division' => $request->permanent_division,
            'p_district' => $request->permanent_district,
            'p_upozila' => $request->permanent_upozilla,
            'office_phone' => $request->org_tel,
            'office_email' => $request->org_email,
            'height' => $request->height,
            'weight' => $request->weight,
            'blood_group' => $request->blood_group,
            'degree' => $request->degree,
            'passing_year' => $request->passing_year,
            'university' => $request->board,
            'father_name' => $request->father,
            'mother_name' => $request->mother,
            'house_no' => $request->village,
            'a_divisaion' => $request->division,
            'b_district' => $request->district,
            'c_upozila' => $request->upozilla,
            'e_name' => $request->contact_name,
            'e_relation' => $request->contact_relation,
            'e_phone' => $request->contact_phone,
            'photo' => $unique_name,
            'validity' => $current->addYear(2),
            'created_at' => Carbon::now(),

        ]);



        return redirect()->back()->with('success','Apply form submitted successfully');

    }

    public function viewTable(){
        $allData = Apply::latest()->get();
        $count = Apply::latest()->count();
        return view('admin.student-application.stu_app',compact('allData','count'));
    }



    public function statusApprove($id){
        $approve = Apply::find($id);


            $approve->status=true;
            $approve->update();


        return redirect()->back()->with('success','status approve successfully');
    }

    public function statusInactive($id){
        $inactive = Apply::find($id);


        $inactive->status=false;
        $inactive->update();


        return redirect()->back()->with('success','status inactive successfully');
    }

    public function appDetails($id){
        $app_details = Apply::find($id);
        return view('admin.student-application.stu_app_details',compact('app_details'));
    }

}
