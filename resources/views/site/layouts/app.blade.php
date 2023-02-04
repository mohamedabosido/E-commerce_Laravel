<!DOCTYPE html>
<html>

<head>
    @include('site.includes.style')
</head>

<body>
    <div class="hero_area">
        @include('site.includes.header')
        @yield('content')
        @include('site.includes.footer')
</body>
@include('site.includes.script')

</html>
