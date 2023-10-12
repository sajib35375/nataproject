<?php

namespace App\Http\Controllers;

use App\Models\Asession;
use App\Models\Course;
use App\Models\Document;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DocumentController extends Controller
{
    public function syllabus(){
        $document = Document::latest()->get();
        $courses = Course::latest()->get();
        $session = Asession::where('status',true)->get();

        return view('admin.document.upload_document',compact('document','session','courses'));
    }

    public function syllabusStore(Request $request){
        $this->validate($request,[
            'session_id' => 'required',
            'title' => 'required',
            'description' => 'required',
            'syllabus' => 'required',
        ]);

        if ($request->hasFile('syllabus')){
            $file = $request->file('syllabus');
            $unique_name = hexdec(uniqid()).'.'.$file->getClientOriginalExtension();
            $file->move('admin/syllabus/',$unique_name);
        }



        Document::insert([
            'course_id' => $request->course_id,
            'session_id' => $request->session_id,
            'title' => $request->title,
            'description' => $request->description,
            'file' => $unique_name,
            'created_at' => Carbon::now(),
        ]);

        return redirect()->back()->with('success','Course Content Uploaded Successfully');

    }

    public function syllabusEdit($id){

        $edit_data = Document::find($id);
        $session = Asession::where('course_id',$edit_data->course_id)->get();
        $course = Course::all();

        return view('admin.document.document_edit',compact('edit_data','session','course'));

    }

    public function syllabusUpdate(Request $request,$id){
        $update_data = Document::find($id);

        $unique_name = '';
        if ($request->hasFile('syllabus')){
            $file = $request->file('syllabus');
            $unique_name = hexdec(uniqid()).'.'.$file->getClientOriginalExtension();
            $file->move('admin/syllabus/',$unique_name);
            unlink('admin/syllabus/'.$request->old_file);

        }else{
            $unique_name = $request->old_file;
        }

        $update_data->course_id = $request->course_id;
        $update_data->session_id = $request->session_id;
        $update_data->title = $request->title;
        $update_data->description = $request->description;
        $update_data->file = $unique_name;
        $update_data->updated_at = Carbon::now();
        $update_data->update();

        return redirect()->route('view.syllabus')->with('success','Course Content Updated Successfully');
    }


    public function allSyllabus(){
        $syllabus = Document::latest()->get();
        return view('frontend.syllabus.all_syllabus',compact('syllabus'));
    }


    public function downloadSyllabus($file){

        return response()->download('admin/syllabus/'.$file);

    }


    public function documentSingle($id){
        $doc_single = Document::find($id);
        return view('admin.document.doc_single_view',compact('doc_single'));
    }

    public function documentDelete($id){
        $delete_data = Document::find($id);
        $delete_data->delete();
        unlink('admin/syllabus/'.$delete_data->file);

        return redirect()->back()->with('success','Course Content Deleted Successfully');
    }

    public function sessionSelect($id){
        $ass = Asession::where('course_id',$id)->get();
        return json_encode($ass);
    }

    public function editSessionSelect($id){
        $ass = Asession::where('course_id',$id)->get();
        return json_encode($ass);
    }

}
