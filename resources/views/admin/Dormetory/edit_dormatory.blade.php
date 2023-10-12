@extends('admin.dashboard')
@section('content')


   <div class="container">
       <div class="row">
           <div class="col-md-12">
               <div class="card">
                   <div class="card-header">
                       <h2>Edit Dormatory</h2>
                   </div>
                   <div class="card-body">
                       <form action="{{ route('update.dormatory',$edit_data->id) }}" method="POST">
                           @csrf

                           <div class="form-group">
                               <label for="">Dormatory Name</label>
                               <input name="dormatory_name" value="{{ $edit_data->dormatory_name }}" class="form-control" type="text">
                           </div>
                           <div class="form-group">
                               <input class="btn btn-success" type="submit">
                           </div>
                       </form>
                   </div>
               </div>
           </div>

       </div>
   </div>








@endsection