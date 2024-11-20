<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ siteSetting("site_name") }} | @yield('title')</title>
    <meta name="description" content="{{siteSetting("site_description")}}" />
    <link rel="shortcut icon" type="image/png" href="{{asset("assets/images/logos/andini-2.ico")}}">
    <!--  Aos -->
    <link rel="stylesheet" href="{{asset("landing/libs/aos/dist/aos.css")}}">
    <link rel="stylesheet" href="{{asset("landing/libs/owl.carousel/dist/assets/owl.carousel.min.css")}}">
    <link rel="stylesheet" href="{{asset("landing/css/style.css")}}">
    <link rel="stylesheet" href="{{ asset('assets/libs/fontawesome/css/all.min.css') }}">

    <link rel="stylesheet" href="{{asset("landing/css/app.css")}}">
    @stack('css')
</head>

<body>
    <div class="page-wrapper p-0 overflow-hidden">
        @include('layouts.partials.landing-header')
        @yield('content')
    </div>
    @include('layouts.partials.landing-footer')
    <script src="{{asset("landing/libs/jquery/dist/jquery.min.js")}}"></script>
    <script src="{{asset("landing/libs/aos/dist/aos.js")}}"></script>
    <script src="{{asset("landing/libs/bootstrap/dist/js/bootstrap.bundle.min.js")}}"></script>
    <script src="{{asset("landing/libs/owl.carousel/dist/owl.carousel.min.js")}}"></script>
    <script src="{{asset('assets/libs/apexcharts/dist/apexcharts.min.js')}}"></script>
    <script src="{{asset("landing/js/custom.js")}}"></script>
    @stack('scripts')
</body>

</html>
