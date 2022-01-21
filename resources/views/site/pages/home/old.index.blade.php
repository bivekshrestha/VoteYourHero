@extends('site.layouts.master')

@section('title')
Home
@endsection

@section('description')
@endsection

@section('keywords')
@endsection

@section('content')

{{--    @include('site.pages.home.includes.slider')--}}

<div class="card bg-dark text-white home_banner">
    <img src="{{ asset('/images/banner.jpg') }}" class="card-img bg_image" alt="Banner">
    <div class="card-img-overlay d-flex flex-column justify-content-center align-items-center">
        <div class="d-flex flex-column justify-content-center align-items-center">
            <h2 class="display-4 animate__animated animate__backInRight" style="font-family: 'Train One', cursive;">Shant Sharma's</h2>
            <img class="animate__animated animate__backInLeft logo_208" src="{{ asset('images/Logo White Half.png') }}" alt="Logo">
            <h1 class="animate__animated animate__fadeInUp">Heroes Journey To Everest</h1>
        </div>
        <div class="d-flex justify-content-center">
            <a class="btn btn-outline-light mr-3 grow my_btn" href="{{ route('vote') }}">Vote your hero</a>
            <a class="btn btn-outline-light grow my_btn" href="{{ route('hero.create') }}">Add your hero</a>
        </div>
    </div>
</div>


<ul class="nav region nav-tabs nav-pills mb-3 pill-style" id="pills-tab" role="tablist">
    <li class="nav-item" role="presentation">
        <a class="nav-link active" id="pills-all-tab" data-toggle="pill" href="#pills-all" role="tab"
            aria-controls="pills-all" aria-selected="true">All Countries</a>
    </li>
    <li class="nav-item" role="presentation">
        <a class="nav-link" id="pills-asia-tab" data-toggle="pill" href="#pills-asia" role="tab"
            aria-controls="pills-asia" aria-selected="false">Asia</a>
    </li>
    <li class="nav-item" role="presentation">
        <a class="nav-link" id="pills-europe-tab" data-toggle="pill" href="#pills-europe" role="tab"
            aria-controls="pills-europe" aria-selected="false">Europe</a>
    </li>
    <li class="nav-item" role="presentation">
        <a class="nav-link" id="pills-africa-tab" data-toggle="pill" href="#pills-africa" role="tab"
            aria-controls="pills-africa" aria-selected="false">Africa</a>
    </li>
    <li class="nav-item" role="presentation">
        <a class="nav-link" id="pills-namerica-tab" data-toggle="pill" href="#pills-namerica" role="tab"
            aria-controls="pills-namerica" aria-selected="false">North America</a>
    </li>
    <li class="nav-item" role="presentation">
        <a class="nav-link" id="pills-samerica-tab" data-toggle="pill" href="#pills-samerica" role="tab"
            aria-controls="pills-samerica" aria-selected="false">South America</a>
    </li>
    <li class="nav-item" role="presentation">
        <a class="nav-link" id="pills-australia-tab" data-toggle="pill" href="#pills-australia" role="tab"
            aria-controls="pills-australia" aria-selected="false">Oceania</a>
    </li>
</ul>

<div class="tab-content mb-5" id="pills-tabContent">
    <div class="tab-pane fade show active" id="pills-all" role="tabpanel" aria-labelledby="pills-all-tab">
        <div class="container-fluid mt-5">

            <div class="row mx-0">
                <div class="col-12 mb-3">
                    <h3 class="section_title">Top Heroes</h3>
                </div>
                @foreach($countries['all'] as $country)
                <div class="col-12 col-md-6 mb-2">
                    <x-cards.country-card :country="$country" />
                </div>
                @endforeach
                <span class="d-none paginate" data-page="2" data-link="/country/load?page=" data-div="#posts"></span>
                <div class="dynamic-country w-100 row"></div>
                <div class="text-center w-100 mt-2">
                    <div class="spinner-border text-warning"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="tab-pane animate__animated animate__slideInUp" id="pills-asia" role="tabpanel"
        aria-labelledby="pills-asia-tab">
        <div class="container-fluid mt-5">

            <div class="row mx-0">
                <div class="col-12 mb-3">
                    <h3 class="section_title">Top Heroes Of Asia</h3>
                </div>
                @foreach($countries['asia'] as $country)
                <div class="col-12 col-md-6 mb-2">
                    <x-cards.country-card :country="$country" />
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="tab-pane animate__animated animate__slideInUp" id="pills-europe" role="tabpanel"
        aria-labelledby="pills-europe-tab">
        <div class="container-fluid mt-5">

            <div class="row mx-0">
                <div class="col-12 mb-3">
                    <h3 class="section_title">Top Heroes Of Europe</h3>
                </div>
                @foreach($countries['europe'] as $country)
                <div class="col-12 col-md-6 mb-2">
                    <x-cards.country-card :country="$country" />
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="tab-pane animate__animated animate__slideInUp" id="pills-africa" role="tabpanel"
        aria-labelledby="pills-africa-tab">
        <div class="container-fluid mt-5">

            <div class="row mx-0">
                <div class="col-12 mb-3">
                    <h3 class="section_title">Top Heroes Of Africa</h3>
                </div>
                @foreach($countries['africa'] as $country)
                <div class="col-12 col-md-6 mb-2">
                    <x-cards.country-card :country="$country" />
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="tab-pane animate__animated animate__slideInUp" id="pills-namerica" role="tabpanel"
        aria-labelledby="pills-namerica-tab">
        <div class="container-fluid mt-5">

            <div class="row mx-0">
                <div class="col-12 mb-3">
                    <h3 class="section_title">Top Heroes Of North America</h3>
                </div>
                @foreach($countries['namerica'] as $country)
                <div class="col-12 col-md-6 mb-2">
                    <x-cards.country-card :country="$country" />
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="tab-pane animate__animated animate__slideInUp" id="pills-samerica" role="tabpanel"
        aria-labelledby="pills-samerica-tab">
        <div class="container-fluid mt-5">

            <div class="row mx-0">
                <div class="col-12 mb-3">
                    <h3 class="section_title">Top Heroes Of South America</h3>
                </div>
                @foreach($countries['samerica'] as $country)
                <div class="col-12 col-md-6 mb-2">
                    <x-cards.country-card :country="$country" />
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="tab-pane animate__animated animate__slideInUp" id="pills-australia" role="tabpanel"
        aria-labelledby="pills-australia-tab">
        <div class="container-fluid mt-5">

            <div class="row mx-0">
                <div class="col-12 mb-3">
                    <h3 class="section_title">Top Heroes Of Oceania</h3>
                </div>
                @foreach($countries['australia'] as $country)
                <div class="col-12 col-md-6 mb-2">
                    <x-cards.country-card :country="$country" />
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
    <script>
            $('.spinner-border').hide()

        $(window).scroll(function() {
        var link = $('.paginate').data('link'); //current URL
        var page = $('.paginate').data('page'); //get the next page #
        var href = link + page; //complete URL
        console.log(href)
        if($(window).scrollTop() == $(document).height() - $(window).height()) {
            $('.spinner-border').show()
            $.ajax({
                url: href,
                type: 'get',
                success: function(response){
                    console.log(response)
                $('.spinner-border').hide()

                $(".dynamic-country").append(response).fadeIn("slow");
                }
            });

            $('.paginate').data('page', (parseInt(page) + 1)); //update page #
        }
    });
    </script>
@endsection
