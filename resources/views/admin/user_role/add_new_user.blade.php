@extends('admin.dashboard')
@section('content')


 <div class="wrap" style="margin: 7px;">
     <div class="row">
         <div class="col-md-12">
             <div class="card">
                 <div class="card-header">
                     <h2>Add New Admin</h2>
                 </div>
                 <div class="card-body">
                     <form action="{{ route('store.user.role') }}" method="POST" enctype="multipart/form-data">
                         @csrf
                         <div class="form-group">
                             <label for="">User Name <span class="text-danger">*</span></label>
                             <input name="name" class="form-control" type="text">
                         </div>
                         <div class="form-group">
                             <label for="">User Email<span class="text-danger">*</span></label>
                             <input name="email" class="form-control" type="text">
                         </div>
                         <div class="form-group">
                             <label for="">User Phone<span class="text-danger">*</span></label>
                             <input name="phone" class="form-control" type="text">
                         </div>
                         <div class="form-group">
                             <label for="">User Photo<span class="text-danger">*</span></label>
                             <input name="photo" class="form-control-file" type="file">
                         </div>
                         <div class="form-group">
                             <label for="">User Password<span class="text-danger">*</span></label>
                             <input name="password" class="form-control" type="password">
                         </div>
                         <div class="form-group">
                             <label for="">Access<span class="text-danger">*</span></label>
                             <div class="row">
                                 <div class="col-md-4">
                                     <fieldset>
                                         <input name="slider" type="checkbox" id="checkbox_1"  value="1">
                                         <label for="checkbox_1">Slider</label>
                                     </fieldset>
                                     <fieldset>
                                         <input name="course" type="checkbox" id="checkbox_2"  value="1">
                                         <label for="checkbox_2">Course</label>
                                     </fieldset>
                                     <fieldset>
                                         <input name="pro_info" type="checkbox" id="checkbox_3"  value="1">
                                         <label for="checkbox_3">Professional Address</label>
                                     </fieldset>
                                     <fieldset>
                                         <input name="per_info" type="checkbox" id="checkbox_4"  value="1">
                                         <label for="checkbox_4">Permanents Address</label>
                                     </fieldset>
                                 </div>
                                 <div class="col-md-4">
                                     <fieldset>
                                         <input name="batch" type="checkbox" id="checkbox_5"  value="1">
                                         <label for="checkbox_5">Batch</label>
                                     </fieldset>
                                     <fieldset>
                                         <input name="syllabus" type="checkbox" id="checkbox_6"  value="1">
                                         <label for="checkbox_6">Syllabus</label>
                                     </fieldset>
                                     <fieldset>
                                         <input name="participants" type="checkbox" id="checkbox_7"  value="1">
                                         <label for="checkbox_7">Participants</label>
                                     </fieldset>
                                     <fieldset>
                                         <input name="post" type="checkbox" id="checkbox_8"  value="1">
                                         <label for="checkbox_8">Post</label>
                                     </fieldset>
                                 </div>
                                 <div class="col-md-4">
                                     <fieldset>
                                         <input name="certificate" type="checkbox" id="checkbox_9"  value="1">
                                         <label for="checkbox_9">Certificate</label>
                                     </fieldset>
                                     <fieldset>
                                         <input name="dormatory" type="checkbox" id="checkbox_10"  value="1">
                                         <label for="checkbox_10">Dormatory</label>
                                     </fieldset>
                                     <fieldset>
                                         <input name="admin_role" type="checkbox" id="checkbox_11"  value="1">
                                         <label for="checkbox_11">Admin Role</label>
                                     </fieldset>
                                     <fieldset>
                                         <input name="dg_info" type="checkbox" id="checkbox_12"  value="1">
                                         <label for="checkbox_12">DG</label>
                                     </fieldset>

                                 </div>
                             </div>
                         </div>
                         <div class="form-group">
                             <input type="submit" class="btn btn-success" value="Add User">
                         </div>
                     </form>
                 </div>
             </div>
         </div>
     </div>
 </div>



@endsection