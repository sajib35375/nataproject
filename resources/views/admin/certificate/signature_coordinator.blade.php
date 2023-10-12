@extends('admin.dashboard')
@section('content')


    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-body">
                        <form action="">
                            <div class="form-group">
                                <label for=""><strong>Coordinator Signature</strong></label>
                                <input name="course_coordinator" class="form-control-file" type="file">
                            </div>
                            <div class="form-group">
                                <input class="btn btn-primary" type="submit">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>







@endsection