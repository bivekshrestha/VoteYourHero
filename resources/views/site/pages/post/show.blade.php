@extends('site.layouts.master')

@section('title'){{ $post->meta_title }}@endsection

@section('description'){{ $post->meta_description }}@endsection

@section('keywords'){{ $post->meta_keywords }}@endsection

@section('canonical'){{ \Illuminate\Support\Facades\URL::current() }}@endsection

@section('content')
    <div class="bg-white">
        <div class="card bg-dark h-100 text-white" style="border-radius: 0">
            <img src="{{ asset('storage/' . $post->image->path) }}" class="card-img" alt="{{$post->title}}"
                 style="width:100%;height:400px">
            <div class="card-img-overlay" style="opacity: 70%;background: black"></div>
            <div class="card-img-overlay d-flex justify-content-center align-items-center flex-column">
                <h1 class="card-title text-center">{{ $post->title }}</h1>
                <h5>{{ $post->created_at->diffForHumans() }}</h5>
            </div>
        </div>
        <div class="container mt-3 py-3">
            {!! $post->description !!}
        </div>

    </div>
@endsection
