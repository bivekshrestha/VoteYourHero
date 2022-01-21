<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>208 journey to everest</title>

    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon"/>

    <!-- Meta Tags -->
@include('site.partials.meta')

<!-- Fonts -->

    <!-- Styles -->
    @include('site.partials.styles')

</head>
<body>
@include('sweetalert::alert')
<div style="height: 100vh;">
    <div class="card bg-dark text-white home_banner h-100">
        <img src="{{ asset('/images/banner.jpg') }}" class="card-img bg_image" alt="Banner" style="height: 100vh">
        <div class="card-img-overlay d-flex flex-column justify-content-center align-items-center">
            <div class="d-flex flex-column justify-content-center align-items-center">
                <h2 class="display-4 animate__animated animate__backInRight" style="font-family: 'Train One', cursive;">
                    Shant Sharma's</h2>
                <img class="animate__animated animate__backInLeft" src="{{ asset('images/Logo White Half.png') }}"
                     alt="Logo" style="height: 150px; width: auto; opacity: 100%">
                <h1 class="animate__animated animate__fadeInUp">Heroes Journey To Everest</h1>
            </div>
            <div class="d-flex justify-content-center">
                <form action="{{ route('start.ok') }}" method="POST">
                    @csrf
                    <button
                        type="submit"
                        class="btn btn-outline-light mr-3 grow my_btn px-5 py-3"
                        style="font-size: 25px; font-weight: 700; text-transform: uppercase"
                    >
                        Start
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Scripts -->
@include('site.partials.scripts')
@yield('scripts')
</body>
</html>
