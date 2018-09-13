<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    @include('admin.layout.header')
    {{--公用 css--}}
    @include('admin.layout.css')
    {{--页面级 css--}}
    @yield('css')
</head>
<body>
<div id="wrap">

    {{--页面级 html--}}
    @yield('content')
    {{--公用 html--}}
    @include('admin.layout.common_html')
    {{--公用 js--}}
    @include('admin.layout.motail_scripts')
    {{--页面级 js--}}
    @yield('js')
</div>
@include('admin.layout.footer')
</body>
</html>