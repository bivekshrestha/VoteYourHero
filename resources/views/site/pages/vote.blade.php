@extends('site.layouts.master')

@section('title'){{ $meta->meta_title }}@endsection

@section('description'){{ $meta->meta_description }}@endsection

@section('keywords'){{ $meta->meta_keywords }}@endsection

@section('robots')@if($meta->indexing){{ $meta->indexing }}@else{{ 'index, follow' }}@endif
@endsection

@section('canonical')@if($meta->canonical){{ $meta->canonical }}@else{{ \Illuminate\Support\Facades\URL::current() }}@endif
@endsection

@section('content')
    <div class="container tb_spacing">
        <div class="row bg-">
            @foreach($heroes as $hero)
                <div class="col-12 col-md-4 p-2">
                    <div class="d-flex flex-column align-items-center text-center card shadow-sm p-4">
                        <img
                            class="shadow hero-image mb-3"
                            src="{{ asset($hero->photo) }}"
                            alt="Hero image"
                        >
                        <h4>
                            <strong>
                                {{ $hero->first_name }}@if($hero->middle_name )&nbsp{{ $hero->middle_name }}@endif
                                &nbsp{{ $hero->last_name }}
                            </strong>
                        </h4>
                        <a class="text-dark text-decoration-none font-weight-bold" href="{{ route('country.show', $hero->country->slug) }}">
                            <img
                                style="width: 40px; height: 25px;"
                                src="{{ asset('images/flags/Flag of ' . $hero->country->name . '.gif') }}"
                                alt="{{ $hero->country->name }}"
                            >
                            {{ $hero->country->name }}
                        </a>
                        <div class="mt-3">
                            @auth
                                <button
                                    class="btn btn-outline-primary grow-vote my_btn px-4"
                                    id="vote-btn-{{$hero->id}}"
                                    onclick="voteOnHero(event);"
                                    data-hero-id="{{ $hero->id }}"
                                >
                                    Vote
                                </button>
                            @else
                                <button
                                    class="btn btn-outline-primary btn-sm grow-vote my_btn px-4"
                                    data-toggle="modal"
                                    data-target="#loginModal"
                                >
                                    Vote
                                </button>
                            @endauth
                        </div>
                        <strong>
                           <i class="fas fa-poll"></i>
                            <span id="vote-count-{{$hero->id}}" style="font-size: 22px">{{ $hero->votes }}</span>
                        </strong>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
