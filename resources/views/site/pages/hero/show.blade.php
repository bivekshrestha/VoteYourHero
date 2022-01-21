@extends('site.layouts.master')

@section('title')
Hero
@endsection

@section('description')
@endsection

@section('keywords')
@endsection

@section('content')
<div class="container px-4 tb_spacing">
    <div class="bg-white shadow rounded overflow-hidden">
        <div class="px-4 pt-0 pb-4 cover">
            <div class="media profile-head flex-column flex-md-row align-items-md-end align-items-center">
                <div class="profile mr-0 mr-md-3">
                    <img src="{{ asset($hero->photo) }}" alt="Hero"
                        class="rounded-circle mb-2 img-thumbnail hero-image">
                </div>
                <div class="media-body mb-5 text-white text-center text-md-left">
                    <h1>
                        {{ $hero->first_name }}@if($hero->middle_name )&nbsp{{ $hero->middle_name }}@endif
                        &nbsp{{ $hero->last_name }}
                    </h1>
                    <div class="d-flex justify-content-between flex-column flex-md-row">
                        <h3>
                            <a class="text-white text-decoration-none"
                                href="{{ route('country.show', $hero->country->slug) }}">
                                <img style="width: 40px; height: 25px;"
                                    src="{{ asset('images/flags/Flag of ' . $hero->country->name . '.gif') }}"
                                    alt="{{ $hero->country->name }}">
                                {{ $hero->country->name }}
                            </a>
                        </h3>
                        <div>
                            @auth
                            <button class="btn btn-outline-light grow-vote my_btn px-4 mr-2 mb-2"
                                id="vote-btn-{{$hero->id}}" onclick="voteOnHero(event);" data-hero-id="{{ $hero->id }}">
                                Vote
                            </button>
                            @else
                            <button class="btn btn-outline-light btn-sm grow-vote my_btn px-4 mr-2 mb-2"
                                data-toggle="modal" data-target="#loginModal">
                                Vote
                            </button>
                            @endauth
                        </div>
                    </div>
                    <div class="mb-4">
                        Added {{ $hero->created_at->diffForHumans() }}
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-light p-4 row mx-0 justify-content-end">
            <div class="col-12 col-md-4">
                <h5 class="font-weight-bold mb-0">{{ $hero->profession }}</h5>
                <div class="text-muted mb-2">
                    <i class="fas fa-user-tie mr-1"></i>Profession
                </div>
            </div>

            <div class="col-12 col-md-4">
                <h5 class="font-weight-bold mb-0">{{ $hero->identity }}</h5>
                <div class="text-muted mb-2">
                    <i class="fas fa-building mr-1"></i>Company/Category
                </div>
            </div>

            <div class="col-12 col-md-2">
                <h5 class="font-weight-bold mb-0">{{ $hero->votes }}</h5>
                <div class="text-muted mb-2">
                    <i class="fas fa-poll mr-1"></i>Votes
                </div>
            </div>
        </div>
        <div class="px-3 px-md-0">
            <h3 class="my-3 pl-4">Contribution</h3>
            <div class="p-4 rounded shadow-sm bg-light">
                {{ $hero->contribution }}
            </div>
        </div>
    </div>
</div>
<!-- Go to www.addthis.com/dashboard to customize your tools -->
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-607aa88a1c5c7e43"></script>

@endsection