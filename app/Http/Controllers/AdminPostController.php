<?php

namespace App\Http\Controllers;

use App\Models\Asession;
use App\Models\DGInfo;
use App\Models\Director;
use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Image;

class AdminPostController extends Controller
{
    public function allPosts(){
        $all_post = Post::latest()->get();
        return view('admin.post.all_posts',compact('all_post'));
    }

    public function DGInfo(){
        $info = Director::find(1);
        return view('admin.DGInfo.DG_info',compact('info'));
    }

    public function DGInfoUpdate(Request $request){
            $this->validate($request,[
                'name'=> 'required',
            ]);

        $unique_name = '';
            if($request->hasFile('photo')){
                $image = $request->file('photo');
                $unique_name = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
                Image::make($image)->resize(200,238)->save('NATA_files/image/DG/'.$unique_name);
            }else{
                $unique_name = $request->old_photo;
            }


            $update_info = Director::find(1);
            $update_info->name = $request->name;
            $update_info->photo = $unique_name;
            $update_info->description = $request->long_des;
            $update_info->updated_at = Carbon::now();
            $update_info->update();

            return redirect()->back()->with('success','DG information Updated Successfully');
    }


    public function batchLoad($id){
        $batch = Asession::where('course_id',$id)->get();
        return json_encode($batch);
    }












}
