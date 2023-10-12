

<aside class="main-sidebar">
    <!-- sidebar-->
    <section class="sidebar">

        <div class="user-profile">
            <div class="ulogo">
                <a href="index.html">
                    <!-- logo for regular state and mobile devices -->
                    <div class="d-flex align-items-center justify-content-center">
                        <img src="../images/logo-dark.png" alt="">
                        <h3><b>NATA</b> Admin</h3>
                    </div>
                </a>
            </div>
        </div>

        <!-- sidebar menu-->
        <ul class="sidebar-menu" data-widget="tree">

            <li>
                <a href="{{ route('admin.dashboard') }}">
                    <i data-feather="pie-chart"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            @php

                $slider = (auth()->guard('admin')->user()->slider==1);
                $course = (auth()->guard('admin')->user()->course==1);
                $pro_info = (auth()->guard('admin')->user()->pro_info==1);
                $per_info = (auth()->guard('admin')->user()->per_info==1);
                $batch = (auth()->guard('admin')->user()->batch==1);
                $syllabus = (auth()->guard('admin')->user()->syllabus==1);
                $participants = (auth()->guard('admin')->user()->participants==1);
                $post = (auth()->guard('admin')->user()->post==1);
                $certificate = (auth()->guard('admin')->user()->certificate==1);
                $dormatory = (auth()->guard('admin')->user()->dormatory==1);
                $admin_role = (auth()->guard('admin')->user()->admin_role==1);
                $DG_info = (auth()->guard('admin')->user()->dg_info==1);
            @endphp

            @if($slider==true)
            <li class="treeview">
                <a href="#">
                    <i data-feather="message-circle"></i>
                    <span>Slider</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('slider') }}"><i class="ti-more"></i>All Slider</a></li>

                </ul>
            </li>
            @endif

            @if($course==true)
            <li class="treeview">
                <a href="#">
                    <i data-feather="mail"></i> <span>Course Create</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('course.index') }}"><i class="ti-more"></i>All Courses</a></li>

                </ul>
            </li>

            @if($batch==true)
                <li class="treeview">
                    <a href="#">
                        <i data-feather="pie-chart"></i>
                        <span>Batch Create</span>
                        <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{ route('show.session') }}"><i class="ti-more"></i>All Batch</a></li>

                    </ul>
                </li>
            @endif
@endif

           




@if($pro_info==true)

            <li class="treeview">
                <a href="#">
                    <i data-feather="inbox"></i>
                    <span>Professional Address</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('pro.div') }}"><i class="ti-more"></i>Division</a></li>
                    <li><a href="{{ route('show.district') }}"><i class="ti-more"></i>District</a></li>
                    <li><a href="{{ route('show.upozila') }}"><i class="ti-more"></i>Upazila</a></li>

                </ul>
            </li>
@endif

@if($per_info==true)
            <li class="treeview">
                <a href="#">
                    <i data-feather="inbox"></i>
                    <span>Permanent Address</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('view.division') }}"><i class="ti-more"></i>Division</a></li>
                    <li><a href="{{ route('view.district') }}"><i class="ti-more"></i>District</a></li>
                    <li><a href="{{ route('view.upozila') }}"><i class="ti-more"></i>Upazila</a></li>

                </ul>
            </li>
@endif





         @if($syllabus==true)
            <li class="treeview">
                <a href="#">
                    <i data-feather="pie-chart"></i>
                    <span>Course Content</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('view.syllabus') }}"><i class="ti-more"></i>Upload Content/Document</a></li>

                </ul>
            </li>
@endif



           @if($admin_role==true)
            <li class="treeview">
                <a href="#">
                    <i data-feather="pie-chart"></i>
                    <span>Admin User</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('admin.user.role') }}"><i class="ti-more"></i>All Admin User</a></li>

                </ul>
            </li>
@endif





            @if($DG_info==true)
            <li class="treeview">
                <a href="#">
                    <i data-feather="pie-chart"></i>
                    <span>DG Info</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('dg.info.admin') }}"><i class="ti-more"></i>Director General</a></li>

                </ul>
            </li>
@endif





@if($participants==true)
            <li class="treeview">
                <a href="#">
                    <i data-feather="pie-chart"></i>
                    <span>Participant List</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('view.table') }}"><i class="ti-more"></i>All Participant List</a></li>
                    

                </ul>
            </li>
@endif

     @if($post==true)

            <li class="treeview">
                <a href="#">
                    <i data-feather="pie-chart"></i>
                    <span>Post</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('add.post') }}"><i class="ti-more"></i>Add New Post</a></li>
                    <li><a href="{{ route('all.post') }}"><i class="ti-more"></i>All Posts</a></li>

                </ul>
            </li>
@endif



@if($certificate==true)
                <li>
                    <a href="{{ route('session.wise.view') }}">
                        <i data-feather="pie-chart"></i>
                        <span>Certificate & Release Order</span>
                    </a>
                </li>

@endif

@if($dormatory==true)
            <li class="treeview">
                <a href="#">
                    <i data-feather="pie-chart"></i>
                    <span>Dormatory</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">

                    <li><a href="{{ route('dormatory.room') }}"><i class="ti-more"></i>Dormetory</a></li>
                    <li><a href="{{ route('grade.create') }}"><i class="ti-more"></i>Grade</a></li>
                    <li><a href="{{ route('gender.view') }}"><i class="ti-more"></i>Gender</a></li>
                    <li><a href="{{ route('dormatory.wise') }}"><i class="ti-more"></i>Create Dormetory Rooms</a></li>
                    <li><a href="{{ route('room.assign') }}"><i class="ti-more"></i> Dormetory Room Assign</a></li>




                </ul>
            </li>

@endif






        </ul>
    </section>

{{--    <div class="sidebar-footer">--}}
{{--        <!-- item-->--}}
{{--        <a href="{{ route('admin.dashboard') }}" class="link" data-toggle="tooltip" title="" data-original-title="Settings" aria-describedby="tooltip92529"><i class="ti-settings"></i></a>--}}
{{--        <!-- item-->--}}
{{--        <a href="{{ route('admin.dashboard') }}" class="link" data-toggle="tooltip" title="" data-original-title="Email"><i class="ti-email"></i></a>--}}
{{--        <!-- item-->--}}
{{--        <a href="{{ route('admin.dashboard') }}" class="link" data-toggle="tooltip" title="" data-original-title="Logout"><i class="ti-lock"></i></a>--}}
{{--    </div>--}}
</aside>
