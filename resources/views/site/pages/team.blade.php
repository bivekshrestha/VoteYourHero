@extends('site.layouts.master')

@section('title'){{ $meta->meta_title }}@endsection

@section('description'){{ $meta->meta_description }}@endsection

@section('keywords'){{ $meta->meta_keywords }}@endsection

@section('robots')@if($meta->indexing){{ $meta->indexing }}@else{{ 'index, follow' }}@endif
@endsection

@section('canonical')@if($meta->canonical){{ $meta->canonical }}@else{{ \Illuminate\Support\Facades\URL::current() }}@endif
@endsection

@section('content')
    <div class="bg-white">
        <div class="card bg-dark text-white" style="border-radius: 0">
            <img src="{{ asset('images/2.jpg') }}" class="card-img" alt="banner" style="width:100%;height:320px">
            <div class="card-img-overlay" style="opacity: 70%;background: black"></div>
            <div class="card-img-overlay d-flex justify-content-center align-items-center">
                <h1 class="card-title">Our Team</h1>
            </div>
        </div>

        <div class="px-1 px-md-5 mt-2 mx-0 row justify-content-center tb_spacing our_teams" style="padding-top: 5%">
            @foreach($teams as $key=>$group)
                <div class="col-12 col-lg-4 text-center mt-3">
                    <div class="card p-3 hover-shadow-effect h-100">
                        <blockquote class="blockquote mb-0 card-body">
                            <h3 class="text-muted">
                                {{$key}}
                            </h3>
                            <footer class="blockquote-footer">
                                @foreach($group as $team)
                                    <h3 class="text-dark text-capitalize">
                                        <a
                                            class="text-dark text-decoration-none"
                                            href="@if($team->link){{$team->link}}@else#@endif"
                                            target="_blank"
                                        >
                                            {{$team->name}}
                                        </a>
                                    </h3>
                                @endforeach
                            </footer>
                        </blockquote>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
