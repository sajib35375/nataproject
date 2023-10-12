@extends('frontend.body.app')
@section('content')

    <style>
        .align {
            text-align: center;
        }


        .wrap {
            margin: 30px;
            padding: 30px;
        }

        .heading {
            text-align: center;
        }

    </style>

<div class="wrap">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header heading">
                    <h2>Director General</h2>
                </div>
                <div class="card-body">
                    <div class="align">
                        <img src="{{ URL::to('') }}/NATA_files/image/DG/{{ $dg->photo }}" alt="">
                        <h4>{{ $dg->name }}</h4>
                        <p>{!! $dg->description !!}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



    =

@endsection