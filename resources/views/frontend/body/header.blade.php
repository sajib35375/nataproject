<div id="shdowcont" class="container drop-shadow">
    <div class="container">
        <div class="row drop-shadow" style="background: linear-gradient(90deg, rgba(13, 79, 5, 1) 0%, rgba(68, 193, 13, 1) 42%, rgba(12, 96, 3, 1) 67%);">
            <div class="col-lg-2 col-md-2 hidden-xs hidden-sm" style="padding-left: 0px; margin-left: 0px;">
                <img alt="Nata Header Image" src="./NATA_files/logo.png" class="img-circle pull-left img-responsive" />
            </div>

            <div class="col-xs-12 col-md-10 col-lg-6">
                <h3 class="text-success text-center" style="font-family:&#39;Helvetica Neue&#39;,serif; color:white; font-weight: bold;text-shadow: 1px 1px 2px black, 0 0 25px blue, 0 0 5px darkblue;">
                    National Agriculture Training Academy
                </h3>
                <h5 class="text-center" style="color: yellow; font-weight: bold;">Government of the People's Republic of Bangladesh</h5>
            </div>

            <div class="hidden-xs hidden-sm hidden-md col-lg-4" style="padding-right: 0px; margin-right: 0px;">
                <img alt="Nata Header Image" src="./NATA_files/sidelogo2.png" class="pull-right img-responsive rounded-right" />
            </div>
        </div>
    </div>
    <div
        class="breaking-news-ticker container drop-shadow bn-effect-scroll bn-direction-ltr"
        id="news"
        style="border-color: rgb(249, 6, 0); color: rgb(249, 6, 0); height: 40px; line-height: 40px; border-radius: 2px; border-width: 0px;"
    >
        <!-- news start  -->
        <div class="bn-label" style="background: rgb(249, 6, 0);">NATA News</div>
        <div class="bn-news" style="left: 102.562px; right: 90px;">
            <ul style="width: 4898.24px; margin-left: -114px;">

                @php

                    $notices = \App\Models\Post::where('notice',1)->get();

                @endphp
                @foreach($notices as $notice)
                <li>
                    <a class="buletinLink" href="http://localhost/buletin/12">
                        <span class="bn-seperator" style="background-image: url('public/img/rsz_core.png'); height: 40px;"></span>

                        {{ $notice->title }}
                    </a>
                </li>

                @endforeach


            </ul>
        </div>
        <div class="bn-controls newsbt" style="color: #fff;">
            <button class="newsbt"><span class="bn-arrow bn-prev"></span></button>
            <button class="newsbt"><span class="bn-action bn-pause"></span></button>
            <button class="newsbt"><span class="bn-arrow bn-next"></span></button>
        </div>
    </div>
    <nav class="navbar navbar-default container drop-shadow">
        <ul class="nav navbar-nav">
            <li><a href="{{ route('home') }}">Home</a></li>
            <li class="dropdown">
                <a href="http://tmis.nata.gov.bd/" target="_self" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" data-hover="dropdown">
                    <span class="nav-label">About<span class="caret"></span> </span>
                </a>
                <ul class="dropdown-menu">
                    <a href="http://tmis.nata.gov.bd/" target="_self" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" data-hover="dropdown"> </a>
                    <li>
                        <a href="http://tmis.nata.gov.bd/" target="_self" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" data-hover="dropdown"></a>
                        <a href="{{ route('show.location') }}">Location</a>
                    </li>

                    <li><a href="{{ route('show.background') }}">Background/History</a></li>

                    <li><a href="{{ route('show.vision') }}">Vision &amp; Mission</a></li>

                    <li class="dropdown">
                        <a href="http://tmis.nata.gov.bd/" target="_self" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" data-hover="dropdown">
                            <span class="nav-label">Functions Values &amp; Activities<span class="caret"></span> </span>
                        </a>
                        <ul class="dropdown-menu">
                            <a href="http://tmis.nata.gov.bd/" target="_self" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" data-hover="dropdown"> </a>
                            <li>
                                <a href="http://tmis.nata.gov.bd/" target="_self" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" data-hover="dropdown"></a>
                                <a href="{{ route('core.function') }}">Core Functions of NATA</a>
                            </li>

                            <li><a href="{{ route('core.value') }}">Core Values of NATA</a></li>

                            <li><a href="{{ route('show.activity') }}">Current Activities od NATA</a></li>
                        </ul>
                    </li>

                    <li><a href="{{ route('show.stackholder') }}">Stakeholders</a></li>

                    <li><a href="{{ route('show.organogram') }}">Organogram of NATA</a></li>

                    <li class="dropdown">
                        <a href="http://tmis.nata.gov.bd/" target="_self" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" data-hover="dropdown">
                            <span class="nav-label">Academy Resources<span class="caret"></span> </span>
                        </a>
                        <ul class="dropdown-menu">
                            <a href="http://tmis.nata.gov.bd/" target="_self" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" data-hover="dropdown"> </a>
                            <li>
                                <a href="http://tmis.nata.gov.bd/" target="_self" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" data-hover="dropdown"></a>
                                <a href="{{ route('show.statistic') }}">Statistics of Civil Officers and Staff</a>
                            </li>

                            <li><a href="{{ route('show.physical') }}">Physical Facilities</a></li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="http://tmis.nata.gov.bd/" target="_self" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" data-hover="dropdown">
                    <span class="nav-label">Training Activities<span class="caret"></span> </span>
                </a>
                <ul class="dropdown-menu dropdownhover-bottom">
                    <a href="http://tmis.nata.gov.bd/" target="_self" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true" data-hover="dropdown"> </a>
                    <li>
                        <a href="http://tmis.nata.gov.bd/" target="_self" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true" data-hover="dropdown"></a>
                        <a href="{{ route('importance.training') }}">Importance of Training</a>
                    </li>

                    <li><a href="{{ route('training.methods') }}">Training Methods</a></li>

                    <li><a href="{{ route('strenghtening') }}">NATA Strengthening Project</a></li>

                    <li><a href="{{ route('resourse.personnel') }}">List of Resource Personnel</a></li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="http://tmis.nata.gov.bd/" target="_self" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" data-hover="dropdown">
                    <span class="nav-label">List of Trainees<span class="caret"></span> </span>
                </a>
                <ul class="dropdown-menu">
                    <a href="http://tmis.nata.gov.bd/" target="_self" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" data-hover="dropdown"> </a>
                    <li>
                        <a href="http://tmis.nata.gov.bd/" target="_self" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" data-hover="dropdown"></a>
                        <a href="http://tmis.nata.gov.bd/trainees-2019-2020">2019 to 2020</a>
                    </li>

                    <li><a href="http://tmis.nata.gov.bd/trainees-2018-2019">2018 to 2019</a></li>

                    <li><a href="http://tmis.nata.gov.bd/trainee-2017-2018">2017 to 2018</a></li>

                    <li><a href="http://tmis.nata.gov.bd/trainees-2016-2017">2016 to 2017</a></li>
                </ul>
            </li>
            <li><a href="{{ route('all.syllabus') }}">Course Content</a></li>
            <li><a href="{{ route('front.view') }}">Registration</a></li>

            <li><a href="{{ route('show.notice') }}">All Notice</a></li>

            <li class="nav-item">
                <a class="nav-link" href="{{ route('user.profile') }}">Profile</a>
            </li>

{{--            <li class="nav-item">--}}
{{--                <a class="nav-link" href="http://localhost/nata/register"></a>--}}
{{--            </li>--}}
        </ul>
    </nav>
