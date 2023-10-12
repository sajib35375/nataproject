@extends('frontend.body.app')

@section('content')
    <style>
        * {box-sizing: border-box;}
        body {font-family: Verdana, sans-serif;}
        .mySlides {display: none;}
        img {vertical-align: middle;}

        /* Slideshow container */
        .slideshow-container {
            max-width: 1000px;
            position: relative;
            margin: auto;
        }

        /* Caption text */
        .text {
            color: #f2f2f2;
            font-size: 15px;
            padding: 8px 12px;
            position: absolute;
            bottom: 8px;
            width: 100%;
            text-align: center;
        }

        /* Number text (1/3 etc) */
        .numbertext {
            color: #f2f2f2;
            font-size: 12px;
            padding: 8px 12px;
            position: absolute;
            top: 0;
        }

        /* The dots/bullets/indicators */
        .dot {
            height: 15px;
            width: 15px;
            margin: 0 2px;
            background-color: #bbb;
            border-radius: 50%;
            display: inline-block;
            transition: background-color 0.6s ease;
        }

        .active {
            background-color: #717171;
        }

        /* Fading animation */
        .fade {
            -webkit-animation-name: fade;
            -webkit-animation-duration: 2s;
            animation-name: fade;
            animation-duration: 5s;
        }

        @-webkit-keyframes fade {
            from {opacity: .4}
            to {opacity: 1}
        }

        @keyframes fade {
            from {opacity: .4}
            to {opacity: 1}
        }

        /* On smaller screens, decrease text size */
        @media only screen and (max-width: 300px) {
            .text {font-size: 11px}
        }
    </style>




    <div class="container">
        <div class="row">

            <div id="lsb" class="animate-left col-sm-3 sidenav ">
                <div class="panel panel-default drop-shadow">
                    <div class="panel-heading text-center" style="font-size: 1.3em;"> <strong>Notice Board </strong></div>
                    <div class="panel-body" style="max-height: 360px;">
                        <div class="row">
                            <div class="col-xs-12" style="overflow-y:scroll;height:245px;">

                                @php

                                    $notices = \App\Models\Post::where('notice',1)->latest()->get();

                                @endphp


                                @foreach($notices as $notice)

                                    <ul>
                                        <li style="" class="news-item">{{ $notice->title }}</li>
                                        <a class="" href="{{ route('single.notice',$notice->id) }}">Read
                                            more...</a>
                                    </ul>

                                @endforeach
                            </div>
                        </div>
                    </div>

                </div>

            </div>


            <div class="col-sm-6">


                <style>
                    .mySlides {display:none; max-height: 320px;max-width: 100%;}
                </style>



                <div class="w3-content" style="background-color:green">

                    @foreach(App\Models\Slider::orderBy('id', 'desc')->get() as $slider)


                        <img class="mySlides" src="{{ URL::to('') }}/NATA_files/image/{{ $slider->photo }}" style="width:100%">

                    @endforeach
                </div>


                <script>
                    var slideIndex = 0;
                    carousel();

                    function carousel() {
                        var i;
                        var x = document.getElementsByClassName("mySlides");
                        for (i = 0; i < x.length; i++) {
                            x[i].style.display = "none";
                        }
                        slideIndex++;
                        if (slideIndex > x.length) {slideIndex = 1}
                        x[slideIndex-1].style.display = "block";
                        setTimeout(carousel, 4000);
                    }
                </script>






            </div>







                        <div class="col-sm-3">
                        <div class="camera_target_content">
                            <div class="cameraContents">
                                <div class="cameraContent">
                                    <div class="camera_caption">
                                        <div>
                                            <p>“Farmer-Entrepreneur: Emerging Driver for Commercial Agriculture” শীর্ষক সেমিনার</p>
                                        </div></div></div><div class="cameraContent" ><div class="camera_caption"><div>
                                            <p>“Farmer-Entrepreneur: Emerging Driver for Commercial Agriculture” শীর্ষক সেমিনার</p>
                                        </div></div></div><div class="cameraContent cameracurrent" style="display: block;"><div class="camera_caption"><div>
                                            <p>NATA Campus</p>
                                        </div></div></div><div class="cameraContent" ><div class="camera_caption"><div>
                                            <p>নাটাতে মাননীয় কৃষি মন্ত্রী মহোদয়কে স্বাগতম</p>
                                        </div></div></div></div>
                        </div>
                            <div class="camera_bar" style="top: auto; height: 7px;"><span class="camera_bar_cont" style="position: absolute; inset: 0px; background-color: rgb(34, 34, 34); opacity: 1;"><span id="pie_0" style="position: absolute; background-color: rgb(249, 6, 0); inset: 2px 360.75px 2px 0px; opacity: 1;"></span></span></div>
                            <div class="camera_commands" style="opacity: 0;"><div class="camera_play" ></div><div class="camera_stop" style=""></div></div>
                            <div class="camera_prev" style="opacity: 0;"><span></span></div>
                            <div class="camera_next" style="opacity: 0;"><span></span></div>
                        </div>
{{--            <div class="camera_pag"><ul class="camera_pag_ul"><li class="pag_nav_0" style="position:relative; z-index:1002"><span><span>0</span></span></li><li class="pag_nav_1" style="position:relative; z-index:1002"><span><span>1</span></span></li><li class="pag_nav_2 cameracurrent" style="position:relative; z-index:1002"><span><span>2</span></span></li><li class="pag_nav_3" style="position:relative; z-index:1002"><span><span>3</span></span></li></ul></div>--}}
{{--            <div class="camera_loader"  >--}}

{{--            </div>--}}


{{--        </div>--}}
{{--            </div>--}}








            @php
                $dg_info = \App\Models\Director::find(1);
            @endphp

            <div id="dg" class="animate-right col-sm-3">
                <div class="card drop-shadow" style="min-height: 138px">
                    <img class="header-bg" src="./NATA_files/nata.gif" width="250" height="90" id="header-blur">
                    <div class="avatar">
                        <img src="{{ URL::to('') }}/NATA_files/image/DG/{{ $dg_info->photo }}" alt="">
                    </div>
                    <div class="content dgbox">
                        <h3 class="text-center" style="font-size: 1.3em;"><b>{{ $dg_info->name }}</b></h3>
                        <p class="text-center" style="color:green; font-size: 1.1em;">Director General</p>
                        <p class="text-center"><a class="btn btn-default" id="btndg" href="{{ route('dg.info') }}">Details</a></p>
                    </div>

                </div>
            </div>




    <div class="container" style="text-align: center;">
        <div class="alert alert-success  text-center"></div>
    </div>

    <main>
        <div class="container">

            <div id="his" class="well" style="padding-left: 15px;padding-right: 15px">
                <article>
                    <div class="justitxt" id="description">
                        <h2 id="phis" style="text-align: center;">Back Ground/History of NATA</h2>
                        <div class="rdmo">
                            <p>National Agriculture Training Academy (NATA) is the apex training institute for human resource development of officers under the Ministry of Agriculture (MoA) for providing training on diversified fields of professional
                                interest in agriculture sector. The academy was established in Gazipur as Central Extension Resources Development Institute (CERDI) on 14 March 1975 as a joint venture of the Government of the People’s Republic of Bangladesh
                                and that of Japan with the financial assistance of Japan International Cooperation Agency (JICA). CERDI was established on 20.0 ha of land with a view to co-ordinate the extension activities, conduct training programmes
                                and develop extension resources and minimize the gap between research and extension. Out of 20.0 ha of land there is a farm of about 11.0 ha, office area of 5.0 ha and residential area of 4.0 ha.
                            </p>
                            <p id="his2">
                                CERDI was an outcome of longtime work experience of Bangladesh and Japanese Experts in this country. Bangladeshi and Japanese Experts started collaboration work in the field of Agriculture since 1960, initially with the program of Agricultural Department
                                in the name of “Pak-Japan Agricultural Extension Training Institute”. The program proved as success and covered different agricultural subjects like Extension, Agronomy, Horticulture, Plant Protection, Irrigation and
                                Farm Machinery. It offered different training of six months course to the Thana Agirultural Officers of the Department of Agricultural Extension until 1965. Later on the Institute was named as “Farm Mechanization Training
                                Institute” under an agreement between the Government of the erstwhile East Pakistan and Japan. Union Agricultural Assistants and progressive young farmers were also trained at this Institute in a three-month course.
                                The value of these activities was realizes and it was conceived to institutionalized the program for creating Bangladesh capabilities for running the same on continuous basis in upgrading form. As a result “Central
                                Extension Resources Development Institute” (CERDI) physically came into operation in 1975. CEERDI was operated as joint project of the Government of Bangladesh and that of Japan upto October, 1983. Since then the Institute
                                has been running without any foreign assistance and the same has been recognized and the business have been reallocated under the special Gazette Notification of June 27, 1984. Then CERDI was considering its changed
                                rule according to NAEP and strategic plan decided to work on imparting training to Extension personnel of DAE, Private and public sectors. On 03 April 2013, Government of the People’s Republic of Bangladesh abolished
                                CERDI and established National Agriculture Training Academy (NATA) as an independent organization of MoA and on 07 June 2014, NATA has been started as a training academy
                            </p>
                        </div>
                    </div>
                </article>
            </div>





            <div class="well" style="padding-left: 15px;padding-right: 15px">

                <div class="row vertical-align">

                    <div class="col-sm-6">
                        <article>
                            <h2 id="ploc" style="text-align: center;">Location</h2>
                            <p class="rdmo">
                                The Academy is situated at Gazipur City Corporation 25 km away from Dhaka city and 3 km away from Joydevpur Chandana Chowrasta towards Gazipur district head quarter. It is located adjacent to Bangladesh Rice Research Institute (BRRI). The academy provides
                                the trainees an ample scope to have free access to the adjacent institutions like Bangladesh Agricultural Research Institute (BARI), Bangladesh Rice Research Institute (BRRI), Bangladesh Sugarcrop Research Institute
                                (BSRI), Seed Certification Agency (SCA), Bangabondhu Sheikh Mujibur Rahman Agricultural University (BSMRAU), Telecommunication Staff College, and other government offices in Gazipur.
                            </p>
                        </article>
                    </div>
                    <div class="col-sm-6">

                        <div class="map-responsive">
                            <img src="" alt="">
                            <iframe src="./NATA_files/embed.html" width="600" height="450" frameborder="0" style="border:0" allowfullscreen=""></iframe>
                            <!--

        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3645.016032364593!2d90.40729572384461!3d23.995210948281052!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755db040ef4fc91%3A0xcfaa26156b258119!2sNATA!5e0!3m2!1sen!2sbd!4v1560999670283!5m2!1sen!2sbd"  width="600" height="380" frameborder="0" style="border:0" allowfullscreen></iframe>
        -->

                        </div>



                    </div>

                </div>


            </div>
            <!-- /.container -->


            <div class="well" style="padding-left: 15px;padding-right: 15px">
                <div class="row">
                    <div class="col-sm-6">
                        <h2 id="pvis" style="text-align: center;">Vision</h2>
                        <p>National Agriculture Training Academy will become a center of excellence for developing competent human resources in agriculture sector.</p>
                        <div>
                            <img src="./NATA_files/vm.png" class="img-responsive center-block" height="200">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <article>
                            <h2 style="text-align: center;">Mission</h2>
                            <p class="rdmo">Developing a common platform of all organizations under the Ministry of Agriculture (MoA) for human resource development by
                            </p><ul class="" style="font-size: 18px; list-style-type:circle;">
                                <li>Imparting quality training, research, development and publications </li>
                                <li>Enhancing linkage between education, research and extension to endow agriculture service delivery system</li>
                                <li>building strong network with reputed institutions of home and abroad for organizational capacity building and promote a culture of continuous learning to foster a knowledge-based governance in agriculture service
                                </li>
                            </ul>
                            <p></p>
                        </article>

                    </div>
                </div>
            </div>

        </div>
    </main>



    <script>
        var slideIndex = 0;
        showSlides();

        function showSlides() {
            var i;
            var slides = document.getElementsByClassName("mySlides");
            var dots = document.getElementsByClassName("dot");
            for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
            }
            slideIndex++;
            if (slideIndex > slides.length) {slideIndex = 1}
            for (i = 0; i < dots.length; i++) {
                dots[i].className = dots[i].className.replace(" active", "");
            }
            slides[slideIndex-1].style.display = "block";
            dots[slideIndex-1].className += " active";
            setTimeout(showSlides, 5000); // Change image every 2 seconds
        }
    </script>


@endsection
