<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="Szymon Zieliński">

<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta name="api_token" content="{{ (Auth::user()) ? Auth::user()->api_token : '' }}">

<title>{{ config('app.name', 'Laravel') }}</title>

<!-- Fonts -->
<link rel="dns-prefetch" href="//fonts.gstatic.com">
{{--<link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">--}}
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons@latest/iconfont/tabler-icons.min.css">
<link href={{asset('css/app.min.css')}} rel="stylesheet">
<link href={{asset('css/tabler.min.css')}} rel="stylesheet">
<link href={{asset('css/tabler-vendors.min.css')}} rel="stylesheet">
<link href={{asset('css/select2.min.css')}} rel="stylesheet">
@stack('styles')
<style>
    [x-cloak] { display: none !important; }
</style>
@livewireStyles

