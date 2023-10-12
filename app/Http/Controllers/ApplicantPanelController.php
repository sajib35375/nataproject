<?php

namespace App\Http\Controllers;

use App\Models\Apply;
use App\Models\Asession;
use Illuminate\Http\Request;
use Auth;
use PDF;

class ApplicantPanelController extends Controller
{
    public function userCertificate(){
        $all_data = Apply::where('user_id',Auth::id())->get();
        return view('frontend.user.user_certificate',compact('all_data'));
    }

    public function userCertificateDownload($id){
        $app = Apply::where('status',true)->where('id',$id)->first();



            $session = Asession::where('id',$app->session_id)->first();
            $data = Apply::where('session_id',$app->session_id)->where('status',true)->get();

            $count = [];
            foreach($data as $fata){
                array_push($count,$fata->id);
            }

            $pdf = PDF::loadView('frontend.user.certificate.certificate', compact('count','data','app','session'))->setPaper('a4','landscape');

            return $pdf->download('certificate.pdf');





    }

    public function userLetterDownload($id){

        $realese = Apply::where('session_id',$id)->where('status',true)->get();
        $letter = Apply::where('session_id',$id)->where('status',true)->first();




           $coor = Asession::where('id',$id)->first();

           $session = Asession::all();

           $session_id = [];

           foreach($session as $data){
               array_push($session_id,$data->id);
           }

           $nilai = Apply::where('session_id',$id)->where('status',true)->orderBy('order','ASC')->get();
           $orgs = [];


           $org_array = [];

           for ( $i=0 ; $i < count($nilai); $i++ ){
               if (!in_array($nilai[$i]->organization_name,$org_array)){
                   array_push($org_array,$nilai[$i]->organization_name);
                   array_push($orgs,$nilai[$i]);
               }

           }


           $pdf = PDF::loadView('frontend.user.letter.letter', compact('letter','orgs','coor','realese'))->setPaper('a4');

           return $pdf->download('Release order.pdf');

    }
}
