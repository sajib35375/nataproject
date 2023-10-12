@extends('admin.dashboard')
@section('content')


<div class="wrap" style="margin: 20px;">
    @if(Session::has('success'))
        <p class="alert alert-success">{{ Session::get('success') }}<button class="close" data-dismiss="alert">&times;</button></p>
    @endif
    @if($errors->any())
        <p class="text-danger">{{ $errors->first() }}</p>
        @endif
   <div class="row">
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">
                   <h2>All Slider</h2>
               </div>
               <div class="card-body">
                   <table class="table">
                       <thead>
                       <tr>
                           <th>#</th>
                           <th>Photo</th>
                           <th>Action</th>
                       </tr>
                       </thead>
                       <tbody>
                       @foreach($data as $d)
                       <tr>
                           <td>{{ $loop->index+1 }}</td>
                           <td><img style="width: 100px;height: 100px;" src="{{ URL::to('') }}/NATA_files/image/{{ $d->photo }}" alt=""></td>
                           <td>
                               <a class="btn btn-info" href="{{ route('slider.edit',$d->id) }}">Edit</a>
                               <a class="btn btn-danger" href="{{ route('slider.delete',$d->id) }}">Delete</a>
                           </td>
                       </tr>
                       @endforeach
                       </tbody>
                   </table>
               </div>
           </div>
       </div>
       <div class="col-md-4">
           <div class="card">
               <div class="card-header">
                   <h2>Add new Slider(size: 900*700)</h2>
               </div>
               <div class="card-body">
                   <form action="{{ route('slider.store') }}" method="POST" enctype="multipart/form-data">
                       @csrf
                       <div class="form-group">
                           <input name="photo" class="form-control-file" type="file">
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
