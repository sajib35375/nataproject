@extends('admin.dashboard')
@section('content')


    <section class="content">
        <div class="row">
            <div class="col-xl-6 col-6">
                <div class="box overflow-hidden pull-up">
                    <div class="box-body" style="text-align: center;">
                        <a href="{{ route('view.table') }}">
                        <div class="icon bg-primary-light rounded w-60 h-60" style="display: block;margin: auto;">
                            <i class="text-warning mr-0 font-size-24 mdi mdi-car"></i>
                        </div>
                        <div>
                            <p class="text-mute mt-20 mb-0 font-size-16"><strong>Total Participant</strong></p>
                            <h3 class="text-white mb-0 font-weight-500">{{ $total_participant }}</h3>
                        </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-6">
                <div class="box overflow-hidden pull-up">
                    <div class="box-body" style="text-align: center;">
                        <a href="{{ route('course.index') }}">
                        <div class="icon bg-warning-light rounded w-60 h-60" style="display: block;margin: auto;">
                            <i class="text-warning mr-0 font-size-24 mdi mdi-car"></i>
                        </div>
                        <div>
                            <p class="text-mute mt-20 mb-0 font-size-16"><strong>Total Courses</strong></p>
                            <h3 class="text-white mb-0 font-weight-500">{{ $total_course }}</h3>
                        </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-6">
                <div class="box overflow-hidden pull-up">
                    <div class="box-body" style="text-align: center;">
                        <a href="{{ route('show.session') }}">
                        <div class="icon bg-info-light rounded w-60 h-60" style="display: block;margin: auto;">
                            <i class="text-warning mr-0 font-size-24 mdi mdi-car"></i>
                        </div>
                        <div>
                            <p class="text-mute mt-20 mb-0 font-size-16"><strong>Total Batches</strong></p>
                            <h3 class="text-white mb-0 font-weight-500">{{ $total_batch }} </h3>
                        </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-6">
                <div class="box overflow-hidden pull-up">
                    <div class="box-body" style="text-align: center;">
                        <a href="{{ route('session.wise.view') }}">
                        <div class="icon bg-danger-light rounded w-60 h-60" style="display: block;margin: auto;">
                            <i class="text-warning mr-0 font-size-24 mdi mdi-car"></i>
                        </div>
                        <div>
                            <p class="text-mute mt-20 mb-0 font-size-16"><strong>Total Certified</strong></p>
                            <h3 class="text-white mb-0 font-weight-500">{{ $total_certified }}</h3>
                        </div>
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-xl-6 col-6">
                <div class="box overflow-hidden pull-up">
                    <div class="box-body" style="text-align: center;">
                        <a href="{{ route('dormatory.room') }}">
                        <div class="icon bg-light rounded w-60 h-60" style="display: block;margin: auto;">
                            <i class="text-warning mr-0 font-size-24 mdi mdi-car"></i>
                        </div>
                        <div>
                            <p class="text-mute mt-20 mb-0 font-size-16"><strong>Total Dormatory</strong></p>
                            <h3 class="text-white mb-0 font-weight-500">{{ $total_dormatory }}</h3>
                        </div>
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-xl-6 col-6">
                <div class="box overflow-hidden pull-up">
                    <div class="box-body" style="text-align: center;">
                        <a href="{{ route('dormatory.wise') }}">
                        <div class="icon bg-light rounded w-60 h-60" style="display: block;margin: auto;">
                            <i class="text-warning mr-0 font-size-24 mdi mdi-car"></i>
                        </div>
                        <div>
                            <p class="text-mute mt-20 mb-0 font-size-16"><strong>Rooms</strong></p>
                            <h3 class="text-white mb-0 font-weight-500">{{ $total_room }}</h3>
                        </div>
                        </a>
                    </div>
                </div>
            </div>







        </div>
    </section>
    <!-- /.content -->








@endsection
