<?php

namespace App\Http\Controllers;

use App\Models\Perdistrict;
use App\Models\Perdivision;
use App\Models\Perupozila;
use App\Models\Prodistrict;
use App\Models\Proupozila;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AddressController extends Controller
{
/*
 * professional address
 * */
    public function districtSelect($id){

        $dis = Prodistrict::where('division_id',$id)->get();
        return json_encode($dis);
    }
    public function upozilaSelect($id){
        $upo = Proupozila::where('district_id',$id)->get();

        return json_encode($upo);
    }

    /*
     * permanent address
     * */

    public function viewDivision(){
        $per_div = Perdivision::latest()->get();
        return view('admin.permanent-info.per_division',compact('per_div'));
    }
    public function storeDivision(Request $request){
        $this->validate($request,[
            'division_name' => 'required',
        ]);

        Perdivision::insert([
            'division_name' => $request->division_name,
            'created_at' => Carbon::now(),
        ]);

        return redirect()->back()->with('success','Division added successfully');
    }

    public function editPerDivision($id){
        $edit_data = Perdivision::find($id);
        return view('admin.permanent-info.per_division_edit',compact('edit_data'));
    }

    public function updatePerDivision(Request $request,$id){
        $update_data = Perdivision::find($id);
        $update_data->division_name = $request->division_name;
        $update_data->update();

        return redirect()->route('view.division')->with('success','Division Updated Successfully');

    }
    public function deletePerDivision($id){
        $delete_data = Perdivision::find($id);
        $delete_data->delete();

        return redirect()->back()->with('success','Division Deleted Successfully');
    }



    public function viewDistrict(){
        $district = Perdistrict::latest()->get();
        $division = Perdivision::latest()->get();
        return view('admin.permanent-info.per_district',compact('district','division'));
    }

    public function storePerDistrict(Request $request){
        $this->validate($request,[
            'division_id' => 'required',
            'district_name' => 'required',
        ]);

        Perdistrict::insert([
            'division_id' => $request->division_id,
            'district_name' => $request->district_name,
            'created_at' => Carbon::now(),
        ]);

        return redirect()->back()->with('success','District added successfully');

    }

    public function perDistrictEdit($id){
        $edit_data = Perdistrict::find($id);
        $division = Perdivision::latest()->get();
        return view('admin.permanent-info.per_dis_edit',compact('edit_data','division'));
    }

    public function perDistrictUpdate(Request $request,$id){
        $update_data = Perdistrict::find($id);
        $update_data->division_id = $request->division_id;
        $update_data->district_name = $request->district_name;
        $update_data->updated_at = Carbon::now();
        $update_data->update();

        return redirect()->route('view.district')->with('success','District Updated Successfully');
    }
    public function perDistrictDelete($id){
        $delete_data = Perdistrict::find($id);
        $delete_data->delete();
        return redirect()->back()->with('success','District Deleted Successfully');
    }


    public function viewUpozila(){
        $division = Perdivision::latest()->get();
        $upozila = Perupozila::latest()->get();
        return view('admin.permanent-info.per_upozila',compact('division','upozila'));
    }
    public function selectPerDistrict($id){
        $district = Perdistrict::where('division_id',$id)->get();
        return json_encode($district);
    }
    public function storePerUpozila(Request $request){
        $this->validate($request,[
            'division_id' => 'required',
            'district_id' => 'required',
            'upozila_name' => 'required',
        ]);

        Perupozila::insert([
            'division_id' => $request->division_id,
            'district_id' => $request->district_id,
            'upozila_name' => $request->upozila_name,
            'created_at' => Carbon::now(),
        ]);
        return redirect()->back()->with('success','Upozila added successfully');
    }

    public function editPerUpozila($id){
        $edit_data = Perupozila::find($id);
        $division = Perdivision::latest()->get();
        $district = Perdistrict::latest()->get();
        return view('admin.permanent-info.edit_per_upozila',compact('edit_data','division','district'));
    }

    public function updatePerUpozila(Request $request,$id){
        $update_data = Perupozila::find($id);
        $update_data->division_id = $request->division_id;
        $update_data->district_id = $request->district_id;
        $update_data->upozila_name = $request->upozila_name;
        $update_data->updated_at = Carbon::now();
        $update_data->update();

        return redirect()->route('view.upozila')->with('success','Upozila Updated successfully');

    }

    public function deletePerUpozila($id){
        $delete_data = Perupozila::find($id);
        $delete_data->delete();

        return redirect()->back()->with('success','Upozila Deleted successfully');

    }


    public function perDistrictSelect($id){
        $data = Perdistrict::where('division_id',$id)->get();
        return json_encode($data);
    }








}
