@extends('admin.dashboard')
@section('content')


    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h2>{{ $batch->session->session_name }} Data</h2>
                        
                    </div>
                    <div class="card-body">
                       <table class="table table-bordered table-striped">
                           <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Course</th>
                                    <th>Email</th>
                                    <th>Gender</th>
                                    <th>Organization</th>
                                    <th>Head of Organization</th>
                                    <th>Date of Birth</th>
                                    <th>Phone</th>
                                    <th>Controlling Officer</th>
                                    <th>Working Station</th>
                                </tr>
                           </thead>
                           <tbody>
                            @foreach($students as $student)
                                <tr>
                                    <td>{{ $loop->index+1 }}</td>
                                    <td>{{ $student->name_en }}</td>
                                    <td>{{ $student->course->course_name }}</td>
                                    <td>{{ $student->email }}</td>
                                    <td>{{ $student->gender }}</td>
                                    <td>{{ $student->organization_name }}</td>
                                    <td>{{ $student->head_of_organization }}</td>
                                    <td>{{ $student->date_of_birth }}</td>
                                    <td>{{ $student->mobile }}</td>
                                    <td>{{ $student->controlling_officer }}</td>
                                    <td>{{ $student->working_station }}</td>
                                </tr>
                            @endforeach
                           </tbody>
                       </table>
                    </div>
                </div>
            </div>
        </div>
    </div>









@endsection