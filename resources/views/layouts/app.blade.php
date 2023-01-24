<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('layouts.head')
</head>
<body>
<div id="app">
    <div class="row g-0 flex-fill">
        <div class="col-12 col-lg-6 col-xl-4 border-top-wide border-primary d-flex flex-column justify-content-center">
            <div class="container container-tight my-5 px-lg-5">
                <div class="text-center mb-4">
                    {{--                        <a href="." class="navbar-brand navbar-brand-autodark"><img src="./static/logo.svg" height="36" alt=""></a>--}}
                    <h1>Fit-me</h1>
                </div>
                @yield('content')

            </div>
        </div>
        <div class="col-12 col-lg-6 col-xl-8 d-none d-lg-block">
            <!-- Photo -->
            <div class="bg-cover h-100 min-vh-100"
                 style="background-image: url({{asset('img/login_bg.jpg')}})"></div>
        </div>
    </div>
</div>
</body>

@yield('scripts')
@stack('scripts')
<script src={{asset("js/sb-admin-2.min.js")}}></script>
<script src="{{asset('js/app.min.js') }}"></script>
</html>
