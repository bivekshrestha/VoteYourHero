@extends('site.layouts.master')

@section('title'){{ $meta->meta_title }}@endsection

@section('description'){{ $meta->meta_description }}@endsection

@section('keywords'){{ $meta->meta_keywords }}@endsection

@section('robots')@if($meta->indexing){{ $meta->indexing }}@else{{ 'index, follow' }}@endif
@endsection

@section('canonical')@if($meta->canonical){{ $meta->canonical }}@else{{ \Illuminate\Support\Facades\URL::current() }}@endif
@endsection

@section('content')
    <div class="container-fluid tb_spacing">
        <div class="row mx-0">
            <div class="col-12 col-md-3 order-1 order-md-0">
                <div class="card py-3">
                    <div class="card-body">
                        <h5>Available Countries</h5>
                        <hr>
                        <input class="form-control mb-3" id="myInput" type="text" placeholder="Search Country">
                        <form method="get" action="{{ route('filter.result') }}" id="filter">
                            @foreach($countries as $country)
                                <div class="form-group">
                                    <input
                                        id="{{$country->name}}"
                                        type="checkbox"
                                        value="{{$country->id}}"
                                        name="country[]"
                                        class="custom-checkbox"
                                        onchange="this.form.submit()"
                                    @if(request('country')){{ in_array( $country->id,request('country')) ? 'checked' :''}}@endif
                                    >
                                    <label for="{{$country->name}}">
                                        <img
                                            style="width: 50px; height: 35px;"
                                            class="shadow-sm ml-2"
                                            src="{{ asset('images/flags/Flag of ' . $country->name . '.gif') }}"
                                            alt="country flag"
                                        >
                                        <span>{{ $country->name }}</span>
                                    </label>
                                </div>
                            @endforeach
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-9 mt-4 mt-md-0">
                <div class="row mx-0">
                    @foreach($heroes as $hero)
                        <div class="col-12 col-md-3 mb-3">
                            <div
                                class="d-flex flex-column align-items-center text-center card shadow-sm py-3 px-2 h-100">
                                <img
                                    class="shadow hero-image mb-3"
                                    src="{{ asset($hero->photo) }}"
                                    alt="Hero image"
                                >
                                <h5>
                                    <strong>
                                        {{ $hero->first_name }}@if($hero->middle_name )
                                            &nbsp{{ $hero->middle_name }}@endif
                                        &nbsp{{ $hero->last_name }}
                                    </strong>
                                </h5>
                                <a class="text-dark text-decoration-none font-weight-bold"
                                   href="{{ route('country.show', $hero->country->slug) }}">
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
                                            class="btn btn-outline-primary grow-vote my_btn px-5"
                                            id="vote-btn-{{$hero->id}}"
                                            onclick="voteOnHero(event);"
                                            data-hero-id="{{ $hero->id }}"
                                        >
                                            Vote
                                        </button>
                                    @else
                                        <button
                                            class="btn btn-outline-primary btn-sm grow-vote my_btn px-5"
                                            data-toggle="modal"
                                            data-target="#loginModal"
                                        >
                                            Vote
                                        </button>
                                    @endauth
                                </div>
                                <strong class="mt-2" style="font-size: 22px">
                                    <i class="fas fa-poll"></i>
                                    <span id="vote-count-{{$hero->id}}">{{ $hero->votes }}</span>
                                </strong>
                            </div>
                        </div>
                    @endforeach

                    <div class="col-12 mt-2">
                        {{ $heroes->appends(request()->all())->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function () {
            $("#myInput").on("keyup", function () {
                let value = $(this).val().toLowerCase();
                $("#filter div").filter(function () {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
        });
    </script>
@stop

