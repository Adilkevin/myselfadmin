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

    {{--左边侧栏--}}
    @include('admin.layout.nav')
    <div id="page-wrapper" class="gray-bg">
        {{--头部导航--}}
        @include('admin.layout.header_nav')
        {{--页面级 html--}}
        @yield('content')

        @include('admin.layout.footer')
    </div>
    {{--公用 html--}}
    @include('admin.layout.common_html')
    {{--公用 js--}}
    @include('admin.layout.scripts')
    {{--页面级 js--}}
    @yield('js')
</div>

</body>
</html>