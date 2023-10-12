<?php

namespace App\Http\Controllers;

use App\Models\Apply;
use App\Models\Dormatory;
use App\Models\Droom;
use App\Models\Gender;
use App\Models\Grade;
use App\Models\Room;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Auth;
use DateTime;
use DatePeriod;
use DateInterval;

class DormatoryController extends Controller
{
    public function dormatoryRoom(){
        $dormatory = Dormatory::latest()->get();
        return view('admin.Dormetory.all_dormatory',compact('dormatory'));
    }
    public function createDormatory(Request $request){

        Dormatory::insert([
            'dormatory_name' => $request->dormatory_name,
            'created_at' => Carbon::now(),
        ]);

        return redirect()->back()->with('success','Dormatory room added successfully');

    }
    public function editDormatory($id){
        $edit_data = Dormatory::find($id);

        return view('admin.Dormetory.edit_dormatory',compact('edit_data'));
    }

    public function updateDormatory(Request $request,$id){
           $update_data = Dormatory::find($id);
           $update_data->dormatory_name = $request->dormatory_name;
           $update_data->updated_at = Carbon::now();
           $update_data->update();

        return redirect()->route('dormatory.room')->with('success','Dormatory room updated successfully');
    }
    public function deleteDormatory($id){
        $delete_data = Dormatory::find($id);
        $delete_data->delete();

        return redirect()->back()->with('success','Dormatory Deleted successfully');
    }

    public function dormatoryWise(){
        $dormatory = Dormatory::latest()->get();
        $room = Droom::latest()->get();
        return view('admin.Dormetory.room_create',compact('dormatory','room'));
    }
    public function dormatoryWiseRoom(Request $request){
        Droom::insert([
            'dormatory_id' => $request->dormatory_id,
            'grade_id' => $request->grade_id,
            'gender_id' => $request->gender_id,
            'room_name' => $request->room_name,
            'created_at' => Carbon::now(),
        ]);

        return redirect()->back()->with('success','Room created successfully');
    }

    public function roomEdit($id){
        $edit_data = Droom::find($id);
        $dormatory = Dormatory::all();
        $grade = Grade::where('dormatory_id',$edit_data->dormatory_id)->get();
        $gender = Gender::where('grade_id',$edit_data->grade_id)->get();
        return view('admin.Dormetory.edit_droom',compact('edit_data','dormatory','grade','gender'));
    }

    public function roomUpdate(Request $request,$id){
        $update_droom = Droom::find($id);
        $update_droom->dormatory_id = $request->dormatory_id;
        $update_droom->grade_id = $request->grade_id;
        $update_droom->gender_id = $request->gender_id;
        $update_droom->room_name = $request->room;
        $update_droom->updated_at = Carbon::now();
        $update_droom->update();

        return redirect()->route('dormatory.wise')->with('success','Dormatory Room updated successfully');
    }
    public function selectDormatoryGrade($id){
        $grade = Grade::where('dormatory_id',$id)->get();
        return json_encode($grade);
    }
    public function selectDormatoryGender($id){
        $gender = Gender::where('grade_id',$id)->get();
        return json_encode($gender);
    }

    public function DorWiseRoomSelect($id){
        $room = Droom::where('dormatory_id',$id)->get();
        return json_encode($room);
    }

    public function GradeCreate(){
        $grade = Grade::latest()->get();
        $domatory = Dormatory::latest()->get();
        return view('admin.Dormetory.grade',compact('grade','domatory'));
    }
    public function GradeCreateStore(Request $request){
        Grade::insert([
            'dormatory_id' => $request->dormatory_id,
            'grade_name' => $request->grade_name,
            'created_at' => Carbon::now(),
        ]);

        return redirect()->back()->with('success','grade inserted successfully');
    }

    public function GradeCreateEdit($id){
        $domatory = Dormatory::all();
        $edit_data = Grade::find($id);
        return view('admin.Dormetory.edit_grade',compact('edit_data','domatory'));
    }

    public function GradeCreateUpdate(Request $request,$id){
        $update_data = Grade::find($id);
        $update_data->dormatory_id = $request->dormatory_id;
        $update_data->grade_name = $request->grade_name;
        $update_data->update();

        return redirect()->route('grade.create')->with('success','grade updated successfully');
    }

    public function GradeCreateDelete($id){
        $delete_data = Grade::find($id);
        $delete_data->delete();
        return redirect()->back()->with('success','Grade Deleted successfully');
    }


    public function genderView(){
        $gender = Gender::latest()->get();
        $dormatory = Dormatory::latest()->get();
        return view('admin.Dormetory.gender',compact('gender','dormatory'));
    }

    public function genderCreate(Request $request){
        Gender::insert([
            'dormatory_id' => $request->dormatory_id,
            'grade_id' => $request->grade_id,
            'gender' => $request->gender,
            'created_at' => Carbon::now(),
        ]);
        return redirect()->back()->with('success','gender inserted successfully');
    }
    public function genderEdit($id){
        $dormatory = Dormatory::latest()->get();
        $edit_data = Gender::find($id);
        $grade = Grade::all();

        return view('admin.Dormetory.edit_gender',compact('dormatory','edit_data','grade'));
    }
    public function genderUpdate(Request $request,$id){
        $update_data = Gender::find($id);
        $update_data->dormatory_id = $request->dormatory_id;
        $update_data->grade_id = $request->grade_id;
        $update_data->gender = $request->gender;
        $update_data->update();

        return redirect()->route('gender.view')->with('success','Gender Updated successfully');
    }
    public function genderDelete($id){
        $delete_data = Gender::find($id);
        $delete_data->delete();
        return redirect()->back()->with('success','Gender Deleted successfully');
    }

    public function SelectGradeEdit($id){
        $select_data = Grade::where('dormatory_id',$id)->get();
        return json_encode($select_data);
    }

    public function gradeSelect($id){
        $grade = Grade::where('dormatory_id',$id)->get();
        return json_encode($grade);

    }

    public function DormatoryGradeSelect($id){
        $grade = Grade::where('dormatory_id',$id)->get();

        return json_encode($grade);
    }
    public function DormatoryGenderSelect($id){
        $gender = Gender::where('grade_id',$id)->get();
        return json_encode($gender);
    }

    public function roomAssign(){
        $dormatory = Dormatory::latest()->get();
        $current = Carbon::now();
        $students = Apply::where('status',true)->get();
        $stu = [];
        foreach($students as $student){
            array_push($stu,$student->id);
        }

        $room = Room::where('start', '<=', $current)
            ->where('validity', '>=', $current)
            ->get();
        $show = Room::where('start', '<=', $current)
            ->where('validity', '>=', $current)->orWhere('start', '>=', $current)
            ->orWhere('validity', '<=', $current)
            ->get();
//        dd($room);
        $filter_id = [];

        foreach ($room as $room_id){
            array_push($filter_id,$room_id->apply_id);

        }

        return view('admin.Dormetory.room_assign',compact('dormatory','show','filter_id','students','room'));
    }

    public function gradeLoad($id){
        $grade = Grade::where('dormatory_id',$id)->get();
        return json_encode($grade);
    }

    public function genderLoad($id){
        $gender = Gender::where('grade_id',$id)->get();
        return json_encode($gender);
    }

    public function roomLoad($id){
        $current = Carbon::now();


        $validity = Room::where('gender_id',$id)->where('start', '<=', $current)
            ->where('validity', '>=', $current)
            ->get();

        $filter_room = [];
        foreach($validity as $room){
           array_push($filter_room,$room->room_id);

        }
        $Droom = Droom::where('gender_id',$id)->whereNotIn('id',$filter_room)->get();
//        dd($filter_room);
        return json_encode($Droom);
    }

    public function roomNoSet(Request $request){

        $this->validate($request, [
            'start' => 'required|before:validity',
            'validity' => 'required|after:start',

        ]);

        $time = strtotime($request -> start);

        $start_date = date('Y-m-d',$time);

        $time2 = strtotime($request -> validity);

        $validity = date('Y-m-d',$time2);

        Room::insert([
            'user_id' => '1',
            'apply_id' => $request->applicant_id,
            'dormatory_id' => $request->dormatory_id,
            'grade_id' => $request->grade_id,
            'gender_id' => $request->gender_id,
            'room_id' => $request->room_id,
            'start' => $start_date,
            'validity' => $validity,
            'created_at' => Carbon::now(),
        ]);

        return redirect()->back()->with('success','Room Assign Successfully');
    }

        public function roomDelete($id){
        $delete_data = Droom::find($id);
        $delete_data->delete();

        return redirect()->back()->with('success','Room Deleted Successfully');
    }



    public function deleteRoomAssign($id)
    {
        $delete_room = Room::find($id);
        $delete_room->delete();

        return redirect()->back()->with('success','Room Assign Deleted Successfully');
    }

    public function dormatoryRoomCheck($id){
        $rooms = Room::where('room_id' , $id)->get();
        $date_array = [];

        foreach($rooms as $room){
            $start_date = $room -> start;

            $end_date   = $room -> validity;
//            dd($end_date);
            $period = new DatePeriod(
                new DateTime($start_date),
                new DateInterval('P1D'),
                new DateTime($end_date)
            );

//            dd($period);
            foreach($period as $pea){
                $date_format = $pea->format('j-n-Y');
                array_push($date_array , $date_format);
            }
            $time = strtotime($end_date);

            $newformat = date('j-n-Y', $time);


            array_push($date_array , $newformat );

        }

        return array_unique($date_array);

    }


}
