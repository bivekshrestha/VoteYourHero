@extends('site.layouts.master')

@section('title'){{ $meta->meta_title }}@endsection

@section('description'){{ $meta->meta_description }}@endsection

@section('keywords'){{ $meta->meta_keywords }}@endsection

@section('robots')@if($meta->indexing){{ $meta->indexing }}@else{{ 'index, follow' }}@endif
@endsection

@section('canonical')@if($meta->canonical){{ $meta->canonical }}@else{{ \Illuminate\Support\Facades\URL::current() }}@endif
@endsection

@section('style')
@stop

@section('content')

    <div class="bg-dark text-white home_banner">
        @include('site.pages.home.includes.slider')

        {{--        <img src="{{ asset('/images/banner-1.jpg') }}" class="card-img bg_image" alt="Banner">--}}

        <div class="card-img-overlay d-flex flex-column justify-content-center align-items-center">
            <div class="d-flex flex-column justify-content-center align-items-center mt-n5 text-center">
                <h2 class="animate__animated animate__backInRight banner_film_by_text"
                    style="text-transform:capitalize">
                    A Film By
                </h2>
                <h2 class="animate__animated animate__backInRight banner_film_by"
                    style="font-family: 'Train One', cursive;">
                    Shant Sharma
                </h2>
                <img class="animate__animated animate__backInLeft logo_208"
                     src="{{ asset('images/Logo White Half.png') }}" alt="Logo">
                <h1 class="animate__animated animate__fadeInUp">Heroes Journey To Everest</h1>
            </div>

            <div class="directed_by text-center">
                <h2 class="animate__animated animate__backInRight font-weight-bold"
                    style="font-size:18px; text-transform:capitalize">
                    Directed By</h2>
                <h2 class="animate__animated animate__backInRight" style="font-family: 'Domine', serif; font-size:22px">
                    Mukunda Bhatta
                </h2>
            </div>

            <div class="d-flex justify-content-center mt-0 mt-md-3 banner_btn">
                <a class="btn btn-outline-light mr-3 grow my_btn" href="{{ route('filter.select.country') }}">
                    Vote your hero</a>
                <a class="btn btn-outline-light grow my_btn" href="{{ route('hero.create') }}">
                    Add your hero
                </a>
            </div>
        </div>
    </div>

    <div class="container-fluid px-5 mt-2 mt-md-4 text-center text-md-right">
        <h3>
            <i class="fas fa-poll-h"></i> Total Votes: {{ $total_votes }}
        </h3>
    </div>


    {{--    <ul class="nav region nav-tabs nav-pills mb-3 pill-style" id="pills-tab" role="tablist">--}}
    {{--        <li class="nav-item" role="presentation">--}}
    {{--            <a class="nav-link active" id="pills-un-tab" data-toggle="pill" href="#pills-un" role="tab"--}}
    {{--               aria-controls="pills-un" aria-selected="true">UN Heroes</a>--}}
    {{--        </li>--}}

    {{--        <li class="nav-item" role="presentation">--}}
    {{--            <a class="nav-link" id="pills-olympic-tab" data-toggle="pill" href="#pills-olympic" role="tab"--}}
    {{--               aria-controls="pills-olympic" aria-selected="false">Olympic Heroes</a>--}}
    {{--        </li>--}}
    {{--    </ul>--}}

    <div class="tab-content mb-5" id="pills-tabContent">
        <div class="tab-pane fade show active" id="pills-un" role="tabpanel" aria-labelledby="pills-un-tab">
            <div class="container-fluid mt-5">

                <div class="row mx-0">
                    <div class="col-12 mb-3">
                        <h3 class="section_title">Top Heroes</h3>
                    </div>
                    @foreach($countries['un'] as $country)
                        @if($country->region == 'un')
                            <div class="col-12 col-md-6 mb-2">
                                <x-cards.country-card :country="$country"/>
                            </div>
                        @endif
                    @endforeach

                    <div class="dynamic-country w-100 row"></div>

                    <div class="row my-3">
                        <div class="col-12">

                            <button
                                class="btn btn-secondary"
                                id="loadMoreCountries"
                                data-page="2"
                                data-link="/country/load?page="
                                data-div="#posts"
                                onclick="loadMoreCountries()"
                            >
                                Load More
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-fluid px-4">
            <div class="bg-white p-3 card">
                <div id="initialContent">
                    {!! str_limit($meta->content, 600) !!}
                </div>
                <div id="allContent" style="display:none;">
                    {!! $meta->content !!}
                </div>
                <div>
                    <button class="btn btn-sm btn-secondary" id="moreBtn" onclick="moreFunction()">See More</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        // $('.spinner-border').hide()

        function loadMoreCountries() {
            let link = $('#loadMoreCountries').data('link'); //current URL
            let page = $('#loadMoreCountries').data('page'); //get the next page #
            let href = link + page; //complete URL

            $.ajax({
                url: href,
                type: 'get',
                success: function (response) {

                    $(".dynamic-country").append(response).fadeIn("slow");
                }
            });

            $('#loadMoreCountries').data('page', (parseInt(page) + 1)); //update page #
        }
    </script>

    <script>
        function moreFunction() {
            let initialContent = document.getElementById('initialContent');
            let allContent = document.getElementById('allContent');
            let moreBtn = document.getElementById('moreBtn');

            if (allContent.style.display === 'none') {
                initialContent.style.display = 'none';
                allContent.style.display = 'inline';
                moreBtn.innerHTML = 'See Less';

            } else {
                allContent.style.display = 'none';
                initialContent.style.display = 'inline';
                moreBtn.innerHTML = 'See More';
            }
        }
    </script>
@endsection
