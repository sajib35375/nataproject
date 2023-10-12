<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Image;

class PostController extends Controller
{
    public function addPost(){
        return view('admin.post.post');
    }

    public function addPostStore(Request $request){

        $this->validate($request,[
            'title' => 'required',
            'short_des' => 'required',
            'long_des' => 'required',
        ]);

        $unique_name = '';
        if($request->hasFile('photo')){
            $image = $request->file('photo');
            $unique_name = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(1200,900)->save('NATA_files/image/'.$unique_name);
        }



        Post::insert([
            'title' => $request->title,
            'short_des' => $request->short_des,
            'long_des' => $request->long_des,
            'location' => $request->location,
            'background' => $request->background,
            'vm' => $request->vm,
            'function' => $request->function,
            'value' => $request->value,
            'activity' => $request->activity,
            'stakeholder' => $request->stakeholder,
            'organogram' => $request->organogram,
            'statistic' => $request->statistic,
            'physical' => $request->physical,
            'importance' => $request->importance,
            'training' => $request->training,
            'nata_Strengthening' => $request->nata_Strengthening,
            'resources' => $request->resources,
            'notice' => $request->notice,
            'photo' => $unique_name,
            'created_at' => Carbon::now(),

        ]);

        return redirect()->back()->with('success','Post Created successfully');
    }


    //frontend load

    public function showLocation(){
        $location = Post::where('location',1)->latest()->get();

        return view('frontend.About.location',compact('location'));
    }

    public function showBackground(){
        $background = Post::where('background',1)->latest()->get();
        return view('frontend.About.background_history',compact('background'));
    }

    public function showOrganogram(){
        $organogram = Post::where('organogram',1)->latest()->get();
        return view('frontend.About.organogram',compact('organogram'));
    }

    public function showStackholder(){
        $stakeholder = Post::where('stakeholder',1)->latest()->get();
        return view('frontend.About.stackholder',compact('stakeholder'));
    }
    public function showVision(){
        $vision = Post::where('vm',1)->latest()->get();
        return view('frontend.About.vision_mission',compact('vision'));
    }

    public function coreFunction(){
        $function = Post::where('function',1)->latest()->get();
        return view('frontend.About.fba.core_function',compact('function'));
    }
    public function coreValue(){
        $value = Post::where('value',1)->latest()->get();
        return view('frontend.About.fba.core_values',compact('value'));
    }
    public function activities(){
        $activity = Post::where('activity',1)->latest()->get();
        return view('frontend.About.fba.activities',compact('activity'));
    }
    public function showPhysical(){
        $physical = Post::where('physical',1)->latest()->get();
        return view('frontend.About.Resourses.physical',compact('physical'));
    }
    public function showStatistic(){
        $statistic = Post::where('statistic',1)->latest()->get();
        return view('frontend.About.Resourses.statistic',compact('statistic'));
    }
    public function importanceTraining(){
        $importance = Post::where('importance',1)->get();
        return view('frontend.About.training_activities.importance_of_training',compact('importance'));
    }
    public function resoursePersonnel(){
        $resourse = Post::where('resources',1)->get();
        return view('frontend.About.training_activities.resourse_personnel',compact('resourse'));
    }

    public function strenghtening(){
        $strength = Post::where('nata_Strengthening',1)->get();
        return view('frontend.About.training_activities.strenghtening',compact('strength'));
    }

    public function trainingMethods(){
        $method = Post::where('training',1)->get();
        return view('frontend.About.training_activities.training_methods',compact('method'));
    }

    public function showNotice(){
        $notice = Post::where('notice',1)->get();
        return view('frontend.notice.notice',compact('notice'));
    }


    public function singleNotice($id){
        $data = Post::find($id);

        return view('frontend.notice.single_notice',compact('data'));

    }

    public function editPost($id){
        $edit_post = Post::find($id);
        return view('admin.post.post_edit',compact('edit_post'));
    }


    public function updatePost(Request $request,$id){
        $update_post = Post::find($id);

        if ($request->hasFile('photo')){
            $image = $request->file('photo');
            $unique_name = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(1200,900)->save('NATA_files/image/'.$unique_name);
        }else{
            $unique_name = $request->old_photo;
        }




        $update_post->title = $request->title;
        $update_post->short_des = $request->short_des;
        $update_post->long_des = $request->long_des;
        $update_post->location = $request->location;
        $update_post->background = $request->background;
        $update_post->vm = $request->vm;
        $update_post->function = $request->function;
        $update_post->value = $request->value;
        $update_post->activity = $request->activity;
        $update_post->stakeholder = $request->stakeholder;
        $update_post->organogram = $request->organogram;
        $update_post->statistic = $request->statistic;
        $update_post->physical = $request->physical;
        $update_post->importance = $request->importance;
        $update_post->training = $request->training;
        $update_post->nata_Strengthening = $request->nata_Strengthening;
        $update_post->resources = $request->resources;
        $update_post->notice = $request->notice;
        $update_post->photo = $unique_name;
        $update_post->update();

        return redirect()->route('all.post')->with('success','Post Updated Successfully');
    }

    public function deletePost($id){
        $delete_post = Post::find($id);
        $delete_post->delete();

        return redirect()->back()->with('success','Post Deleted Successfully');
    }


}












