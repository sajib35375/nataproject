@extends('frontend.body.app')
@section('content')

    <style>
        #box {
            width: 100%;
            height: 500px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .button {
            width: 370px;
            height: 370px;
            padding: 30px;
            color: #0b0b0b;
            background-color: #0aa5df;
            text-decoration: none;
        }
        .button:hover {
            background-color: red;
            color: white;
            text-decoration: none;
        }

    </style>


<div class="container" >

        <div class="card">
            <div class="card-body">
                <div class="row" id="box">


                <div class="col-md-8" >
                    <a class="button" href="{{ route('info.without') }}">Registration with Old Data</a>
                    <a class="button" class="btn btn-info btn-lg" href="{{ route('apply.form') }}">Fresh Registration</a>
                </div>

            </div>
        </div>
    </div>
</div>
















    @endsection