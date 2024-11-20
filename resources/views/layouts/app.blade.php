<!DOCTYPE html>
<html lang="en">

<head>
    <title>{{ siteSetting('site_name') }} | @yield('title')</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="handheldfriendly" content="true" />
    <meta name="MobileOptimized" content="width" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" type="image/png" href="{{ asset('assets/images/logos/andini-2.ico') }}">
    <meta name="description" content="{{ siteSetting('site_description') }}" />
    <meta name="author" content="" />
    <meta name="keywords" content="Mordenize" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link rel="shortcut icon" type="image/png" href="{{ asset('assets/images/logos/favicon.ico') }}" />
    <link rel="stylesheet" href="{{ asset('assets/libs/owl.carousel/dist/assets/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/libs/fontawesome/css/all.min.css') }}">
    <link id="themeColors" rel="stylesheet" href="{{ asset('assets/css/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/plugins/global/plugins.bundle.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
    @stack('vendor-css')
    @stack('css')
</head>

<body style="overflow: hidden">
    <div class="preloader">
        <img src="{{ asset('assets/images/logos/logo-andini.svg') }}" alt="loader" style="width: 180px;"
            class="lds-ripple img-fluid" />
    </div>
    <div class="transparent-preloader">
        <img src="{{ asset('assets/images/logos/logo-andini.svg') }}" alt="loader" style="width: 180px;"
            class="lds-ripple img-fluid" />
    </div>
    <div class="page-wrapper" id="main-wrapper" data-theme="blue_theme" data-layout="vertical" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">
        <x-header />
        <aside class="left-sidebar pt-4 theSidebar-height">
            <div>
                @include('layouts.partials.sidebar')
            </div>
        </aside>
        <div class="body-wrapper">
            <div class="container-xxl" style="max-width: 1560px;">
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        @yield('content')
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="dark-transparent sidebartoggler"></div>
    <div class="dark-transparent sidebartoggler"></div>


    @include('layouts.partials.header-mobile')


    <script src="{{ asset('assets/plugins/global/plugins.bundle.js') }}"></script>
    <script src="{{ asset('assets/libs/datatables/datatables.bundle.js') }}"></script>

    @stack('vendor-scripts')
    <script src="{{ asset('assets/js/app.min.js') }}"></script>
    <script src="{{ asset('assets/js/app.init.js') }}"></script>
    <script src="{{ asset('assets/js/app-style-switcher.js') }}"></script>
    <script src="{{ asset('assets/js/sidebarmenu.js') }}"></script>

    <script src="{{ asset('assets/js/custom.js') }}"></script>
    <script src="{{ asset('assets/libs/fontawesome/js/all.min.js') }}"></script>

    @stack('scripts')
</body>

</html>
