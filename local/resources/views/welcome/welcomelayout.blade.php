<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <base href="{{ asset('/') }}" />
    <link rel="shortcut icon" type="image/png" href="img/log.png"/>
    <link rel="shortcut icon" type="image/png" href="img/log.png" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title> E-sante</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" href="{{ URL::asset('accuiel/images/fav.jpg')}}">
    <link rel="stylesheet" href="{{ URL::asset('accuiel/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('accuiel/css/fontawsom-all.min.css')}}">
    <link rel="stylesheet" href="{{ URL::asset('accuiel/css/animate.css')}}">
    <link rel="stylesheet" href="{{ URL::asset('accuiel/plugins/testimonial/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{ URL::asset('accuiel/plugins/testimonial/css/owl.theme.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('accuiel/css/style.css')}}" />
    <style>
        body,html{
    scroll-behavior: smooth;}
    </style>
</head>

<body>

    <!-- ################# Header Starts Here#######################--->

    @include('welcome.navbar')
         @yield('body')
    @include('welcome.footer')
</body>


<script src="{{ URL::asset('accuiel//js/jquery-3.2.1.min.js')}}"></script>
<script src="{{ URL::asset('accuiel/js/popper.min.js')}}"></script>
<script src="{{ URL::asset('accuiel/js/bootstrap.min.js')}}"></script>
<script src="{{ URL::asset('accuiel/plugins/scroll-fixed/jquery-scrolltofixed-min.js')}}"></script>
<script src="{{ URL::asset('accuiel/plugins/testimonial/js/owl.carousel.min.js')}}"></script>
<script src="{{ URL::asset('accuiel/js/script.js')}}"></script>


</html>