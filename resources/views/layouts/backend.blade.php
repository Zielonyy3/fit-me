<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('layouts.head')
</head>
<body id="page-top">
<div id="wrapper">
    @include('layouts.backend.sidebar')
    <div id="content-wrapper" class="d-flex flex-column">
        <div id="content">
            @include('layouts.backend.navbar')
            <div class="container-fluid">
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800">@yield('title', 'Name')</h1>
                    @yield('title_section')
                </div>
                <div class="row">
                    @yield('content')
                </div>
            </div>
        </div>
        @include('layouts.backend.footer')
    </div>

</div>
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>
</body>

@yield('modals')
@stack('modals')
@include('layouts.backend.modals.logout')


@yield('scripts')
@stack('scripts')

<script src="{{asset('js/app.min.js') }}"></script>
<script src={{asset("vendor/bootstrap/js/bootstrap.js")}}></script>

{{--<script src={{asset("vendor/jquery-easing/jquery.easing.min.js")}}></script>--}}
<script src={{asset("js/sb-admin-2.min.js")}}></script>
</html>
