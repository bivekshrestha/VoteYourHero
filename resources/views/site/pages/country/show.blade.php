@extends('site.layouts.master')

@section('title')
    {{ $country->name }}
@endsection

@section('description')
@endsection

@section('keywords')
@endsection

@section('content')
    <div class="container tb_spacing" style="min-height: 60vh">
        <div class="row mx-0 bg-white align-items-center rounded shadow">
            <div class="col-12 col-md-3 px-2">
                <img
                    {{--                    class="w-100"--}}
                    style="max-height: 12rem; max-width: 100%"
                    src="{{ asset('images/flags/Flag of ' . $country->name . '.gif') }}"
                    alt="{{ $country->name }}">
            </div>

            <div class="col-12 col-md-4 mt-2 mt-md-0 py-4">
                <h1>{{ $country->name }}</h1>
                <h5>Phone Code: +{{ $country->phone_code }}</h5>
                <h5>Total Heroes: {{ $country->heroes->count() }}</h5>
                <button class="btn btn-outline-primary mt-1 my_btn" data-toggle="modal" data-target="#heroModal">
                    Add Hero
                </button>
            </div>
            @if(count($country->heroes) > 0)
                <div class="col-12 col-md-5 mt-4 mt-md-0 py-4">
                    <h5>Top Heroes of {{$country->name}}</h5>
                    @foreach($topHeroes as $hero)
                        <div class="row mx-0 mt-1">
                            <div class="pl-0">
                                <strong>
                                    {{ $loop->iteration }}.
                                </strong>
                            </div>
                            <div class="col-8">
                                <strong>
                                    {{ $hero->first_name }}@if($hero->middle_name )&nbsp{{ $hero->middle_name }}@endif
                                    &nbsp{{ $hero->last_name }}
                                </strong>
                            </div>
                            {{--                        <div class="col-3">--}}
                            {{--                            <i class="fas fa-poll mr-1"></i>--}}
                            {{--                            <strong>--}}
                            {{--                                <span id="vote-count-{{$hero->id}}">--}}
                            {{--                                {{ $hero->votes }}--}}
                            {{--                                </span>--}}
                            {{--                            </strong>--}}
                            {{--                        </div>--}}
                        </div>
                    @endforeach
                </div>
            @endif
        </div>

        @if(count($country->heroes) > 0)
            <div class="mt-5 bg-white rounded shadow p-1">
                <table class="table table-responsive">
                    <thead>
                    <tr>
                        <th width="5%">Position</th>
                        <th>Photo</th>
                        <th>Full Name</th>
                        <th>Profession</th>
                        <th>Company/Category</th>
                        <th>Action</th>
                        <th>Votes</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($country->heroes as $hero)
                        <tr class="align-items-center hover-table-effect">
                            <td class="text-center">
                                <a class="text-decoration-none text-dark" href="{{ route('hero.show', $hero->id) }}">
                                    <span class="font-weight-bold" style="font-size: 18px">{{ $loop->iteration }}</span>
                                </a>
                            </td>
                            <td>
                                <a href="{{ route('hero.show', $hero->slug) }}">
                                    <img style="width: 50px; height: 50px; border-radius: 50%" class="shadow-sm"
                                         src="{{ $hero->photo }}" alt="hero">
                                </a>
                            </td>
                            <td>
                                <a class="text-decoration-none text-dark" href="{{ route('hero.show', $hero->id) }}">
                                    <strong>
                                        {{ $hero->first_name }}@if($hero->middle_name )
                                            &nbsp{{ $hero->middle_name }}@endif
                                        &nbsp{{ $hero->last_name }}
                                    </strong>
                                </a>
                            </td>
                            <td>
                                <a class="text-decoration-none text-dark" href="{{ route('hero.show', $hero->id) }}">
                                    {{ str_limit($hero->profession, 15) }}
                                </a>
                            </td>
                            <td>
                                <a class="text-decoration-none text-dark" href="{{ route('hero.show', $hero->id) }}">
                                    {{ str_limit($hero->identity, 15) }}
                                </a>
                            </td>
                            <td>
                                <x-buttons.vote-button :id="$hero->id"></x-buttons.vote-button>
                            </td>
                            <td>
                                <a class="text-decoration-none text-dark" href="{{ route('hero.show', $hero->id) }}">
                                    <i class="fas fa-poll mr-1"></i>
                                    <strong>
                                        <span id="vote-count-{{$hero->id}}">{{ $hero->votes }}</span>
                                    </strong>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>

    @include('site.pages.country.includes.create_hero_modal')
@endsection
