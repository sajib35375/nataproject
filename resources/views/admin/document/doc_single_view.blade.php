@extends('frontend.body.app')

@section('content')



    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body" style="margin:0px;padding:0px;overflow:hidden;height: 1000px;">
                        <h2>{{ $doc_single->title }}</h2>
                        <p>{{ $doc_single->description }}</p>

                        <iframe src="https://view.officeapps.live.com/op/view.aspx?src={{ URL::to('') }}/admin/syllabus/{{ $doc_single->file }}" frameborder="0" style="overflow:hidden;overflow-x:hidden;overflow-y:hidden;height:100%;width:100%;position:absolute;top:0px;left:0px;right:0px;bottom:0px" height="100%" width="100%"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
















@endsection