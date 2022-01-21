<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title') | 208 journey to everest</title>

    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon"/>

    <!-- Meta Tags -->
    @include('site.partials.meta')

<!-- Fonts -->

    <!-- Styles -->
    @include('site.partials.styles')
    @yield('style')

</head>
<body>
@include('sweetalert::alert')
<div>

    @include('site.partials.nav')

    @yield('content')

    @include('site.partials.footer')
</div>
<!-- Scripts -->
@include('site.partials.scripts')
@yield('scripts')
</body>
</html>
