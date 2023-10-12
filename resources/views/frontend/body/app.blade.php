<!DOCTYPE html>
<!-- saved from url=(0022)http://localhost/nata/ -->
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>NATA</title>

    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="shortcut icon" href="http://localhost/nata/public/favicon.ico" type="image/x-icon" />
    <link rel="icon" href="http://localhost/nata/public/favicon.ico" type="image/x-icon" />
    <link href="{{ asset('NATA_files/css') }}" rel="stylesheet" />

    <link rel="stylesheet" href="{{ asset('NATA_files/fakeLoader.css') }}" />
    <link rel="stylesheet" href="{{ asset('NATA_files/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('NATA_files/bootstrap-theme.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('NATA_files/jquery-ui.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('NATA_files/all.css') }}" />

    <link rel="stylesheet" href="{{ asset('NATA_files/ticker.css') }}" />

    <link rel="stylesheet" href="{{ asset('NATA_files/animate.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('NATA_files/dropdownhover.min.css') }}" />

    <link href="{{ asset('NATA_files/camera.css') }}" rel="stylesheet" />
    <script src="{{ asset('NATA_files/jquery-3.4.1.min.js.download') }}"></script>

    <!--
<script src="//ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>

-->
    <script src="{{ asset('NATA_files/fakeLoader.js.download') }}"></script>

    <link rel="stylesheet" href="{{ asset('NATA_files/app.css') }}" />
    <link rel="stylesheet" href="{{ asset('NATA_files/sweetalert2.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('NATA_files/flatpickr.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('NATA_files/style.css') }}">

</head>

<body>
<div style="display: none;">
    <img src="{{ asset('NATA_files/ajax-loading.gif') }}" width="1" height="1" border="0" alt="preload" />
</div>

<div class="fakeloader" style="position: fixed; width: 100%; height: 100%; top: 0px; left: 0px; background-color: rgb(162, 216, 149); z-index: 999; display: none;">
    <div class="fl spinner6" style="position: absolute; left: 649.5px; top: 269px;">
        <div class="rect1"></div>
        <div class="rect2"></div>
        <div class="rect3"></div>
        <div class="rect4"></div>
        <div class="rect5"></div>
    </div>
</div>

<script type="text/javascript">
    jQuery(".fakeloader").fakeLoader({
        timeToHide: 500, //Time in milliseconds for fakeLoader disappear
        zIndex: 999, // Default zIndex
        spinner: "spinner6", //Options: 'spinner1', 'spinner2', 'spinner3', 'spinner4', 'spinner5', 'spinner6', 'spinner7'
        bgColor: "#a2d895", //"#ffd2c9" //"#a2d895"//Hex, RGB or RGBA colors
        // imagePath:"img/ripple.gif" //If you want can you insert your custom image

        /*
spinner6 = ||||
spinner2 cercal .....
spinner5 = box box
*/
    });
</script>

@include('frontend.body.header')

   @yield('content')

@include('frontend.body.footer')
<script src="{{ asset('NATA_files/bootstrap.min.js.download') }}"></script>
<script src="{{ asset('NATA_files/dropdownhover.min.js.download') }}"></script>

<script src="{{ asset('NATA_files/ticker.min.js.download') }}"></script>

<script src="{{ asset('NATA_files/newsbox.min.js.download') }}"></script>

<script src="{{ asset('NATA_files/readmore.min.js.download') }}"></script>

<script src="{{ asset('NATA_files/camera.min.js.download') }}"></script>

<script src="{{ asset('NATA_files/easing.min.js.download') }}" type="text/javascript"></script>
<script src="{{ asset('NATA_files/app.js.download') }}"></script>
<script src="{{ asset('NATA_files/sweetalert2.all.min.js.download') }}"></script>

<script src="{{ asset('NATA_files/viewComponent.js.download') }}"></script>
<div
    id="ajaxLoading"
    style="
                display: none;
                position: fixed;
                top: 0;
                bottom: 0;
                left: 0;
                right: 0;
                margin: auto;
                padding: 8px;
                text-align: center;
                vertical-align: middle;
                width: 85px;
                height: 85px;
                z-index: 1000;
                background: rgba(0, 0, 0, 0.7);
                border-radius: 4px;
            "
>
    <img src="{{ asset('NATA_files/ajax-loading(1).gif') }}" style="margin-bottom: 8px; width: 45px; height: 45px;" />
    <p style="margin: 0; font-size: 14px; color: #fff;">loading...</p>
</div>
</body>
</html>
