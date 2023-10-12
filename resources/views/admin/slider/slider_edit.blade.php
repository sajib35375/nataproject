@extends('admin.dashboard')
@section('content')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<div class="container">
    <div class="card">
        <div class="card-body">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h2>Slider Edit</h2>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('slider.update',$edit_data->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <input name="old_photo" value="{{ $edit_data->photo }}" type="hidden">
                                <img id="image" src="{{ URL::to('') }}/NATA_files/image/{{ $edit_data->photo }}" alt="">
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
</div>

    <script>
        $(document).ready(function (){
            $(document).on('change','input[name="photo"]',function (e){
                e.preventDefault();
                let url = URL.createObjectURL(e.target.files[0]);
                $('img#image').attr('src',url);
            })
        })
    </script>
@endsection