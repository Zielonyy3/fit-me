<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('layouts.head')
</head>
<body id="page-top">
<div class="wrapper">
    @include('layouts.backend.sidebar')
    @include('layouts.backend.navbar')
    <div class="page-wrapper">
        <div class="container-xl">
            @include('layouts.backend.page-header')
        </div>
        <div class="page-body">
            <div class="container-xl">
                <div class="row row-deck row-cards">
                    @yield('content')
                </div>
            </div>
        </div>
        @include('layouts.backend.footer')
    </div>
</div>
</body>

@yield('modals')
@stack('modals')
@include('layouts.backend.modals.logout')

@livewireScripts
<script src="{{asset('js/app.min.js') }}"></script>
<script src={{asset("vendor/bootstrap/js/bootstrap.js")}}></script>

{{--<script src={{asset("vendor/jquery-easing/jquery.easing.min.js")}}></script>--}}
<script src={{asset("js/sb-admin-2.min.js")}}></script>


@yield('scripts')
@stack('scripts')
</html>
