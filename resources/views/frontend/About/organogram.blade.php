@extends('frontend.body.app')

@section('content')



    <div class="container">
        <div class="row">
            <div style="display: flex;align-items: center;padding-left: 60px;" class="col-md-10">
                <div class="card">
                    <div class="card-body">
                        <div  class="post">
                            @foreach($organogram as $data)
                                <img style="width: 1000px;" src="{{ URL::to('') }}/NATA_files/image/{{ $data->photo }}" alt="">
                                <h2>{!! htmlspecialchars_decode($data->title) !!}</h2>
                                <p>{!! htmlspecialchars_decode($data->long_des) !!}</p>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>















@endsection