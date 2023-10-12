<?php

namespace App\Http\Controllers;

use App\Models\Apply;
use App\Models\Asession;
use App\Models\Signature;
use Carbon\Carbon;
use Dompdf\Options;
use Illuminate\Support\Facades\DB;
use Image;
use PDF;
use Illuminate\Http\Request;


class CertificateController extends Controller
{
    public function releaseView($id){
        $letter = Apply::where('session_id',$id)->where('status',true)->get();

        $course_name = Apply::where('session_id',$id)->first();

        $coor = Asession::find($id);

        foreach($letter as $l){
            $same_name = $l->organization_name;
        }

        $nilai = Apply::where('session_id',$id)->where('status',true)->get();
        $order = Apply::where('session_id',$id)->where('status',true)->orderBy('order','ASC')->get();

        $orgs = [];

        $org_array = [];

        for ( $i=0 ; $i < count($nilai); $i++ ){

            if (!in_array($nilai[$i]->organization_name,$org_array)){
            array_push($org_array,$nilai[$i]->organization_name);
            array_push($orgs,$nilai[$i]);
            }

        }
        $sequence = [];
        $sq = [];

        for ( $i=0 ; $i < count($order); $i++ ){
            if (!in_array($order[$i]->organization_name,$sq)){

                array_push($sq,$order[$i]->organization_name);
                array_push($sequence,$order[$i]);
            }

        }

        return view('admin.latter.release', compact('letter','sequence','orgs','coor','course_name'));

    }


    public function certificateView($id){
            $apply = Apply::where('session_id',$id)->where('status',true)->get();
            $sign = Signature::find(1);
            $coor = Asession::find($id);
            $pdfOptions = new Options();
            $pdfOptions->setIsRemoteEnabled(true);
            $pdf = PDF::loadView('admin.certificate.certificate', compact('apply','sign','coor'))->setPaper('A4','landscape');
            set_time_limit(6000);
            return $pdf->download('certificate.pdf');

    }
    public function sessionWiseView(){
        $sess = Asession::where('status',true)->orderBy('id','DESC')->get();
        return view('admin.certificate.session_certificate',compact('sess'));
    }
    public function releaseLatter($id){

        $letter = Apply::where('session_id',$id)->where('status',true)->get();

        $course_name = Apply::where('session_id',$id)->first();

        $coor = Asession::find($id);

        foreach($letter as $l){
            $same_name = $l->organization_name;
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

    $pdf = PDF::loadView('admin.latter.latter', compact('letter','orgs','coor','course_name'))->setPaper('a4');

    return $pdf->stream('Release-order.pdf');

    }

    public function update(Request $request)
    {
        $posts = Apply::all();
        foreach ($posts as $post) {
            foreach ($request->order as $order) {
                if ($order['id'] == $post->id) {
                    $post->update(['order' => $order['position']]);

                }
            }
        }
        return response('Update Successfully', 200);
    }

}
