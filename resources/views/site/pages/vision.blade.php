@extends('site.layouts.master')

@section('title'){{ $meta->meta_title }}@endsection

@section('description'){{ $meta->meta_description }}@endsection

@section('keywords'){{ $meta->meta_keywords }}@endsection

@section('robots')@if($meta->indexing){{ $meta->indexing }}@else{{ 'index, follow' }}@endif
@endsection

@section('canonical')@if($meta->canonical){{ $meta->canonical }}@else{{ \Illuminate\Support\Facades\URL::current() }}@endif
@endsection

@section('content')
    <div class="bg-white py-5">
        <div class="card bg-dark text-white" style="border-radius: 0">
            <img src="{{ asset('images/1.jpg') }}" class="card-img" alt="banner" style="width:100%;height:320px">
            <div class="card-img-overlay" style="opacity: 70%;background: black"></div>
            <div class="card-img-overlay d-flex justify-content-center align-items-center">
                <h1 class="card-title">Our Vision</h1>
            </div>
        </div>

        @foreach($visions as $vision)
            <div class="px-2 px-md-5 my-3">
                <h3>{{ $vision->title }}</h3>
                <div>
                    {!! $vision->description !!}
                </div>
            </div>
            @if(!$loop->last)
                <hr>
            @endif
        @endforeach

    </div>
@endsection
