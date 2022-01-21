@extends('site.layouts.master')

@if($meta)
@section('title'){{ $meta->meta_title }}@endsection

@section('description'){{ $meta->meta_description }}@endsection

@section('keywords'){{ $meta->meta_keywords }}@endsection

@section('robots')@if($meta->indexing){{ $meta->indexing }}@else{{ 'index, follow' }}@endif
@endsection

@section('canonical')@if($meta->canonical){{ $meta->canonical }}@else{{ \Illuminate\Support\Facades\URL::current() }}@endif
@endsection
@endif

@section('content')
    <div class="container-fluid tb_spacing">
        <div class="row mt-5 mt-md-1">
            @foreach($posts as $post)
                <div class="col-12 col-md-3 mb-3">
                    <div class="card border-0 shadow h-100">
                        <img src="{{ asset('storage/' . $post->image->path) }}" alt="{{ $post->title }}"
                             style="height: 200px">
                        <div class="card-body d-flex flex-column justify-content-between">
                            <div>
                                <h5 class="card-title">{{ str_limit($post->title) }}</h5>
                                <p>{{ $post->created_at->diffForHumans() }}</p>
                            </div>
                            {{--                            <p class="card-text">{!! str_limit($post->description, 150) !!}</p>--}}
                            <div class="ml-auto">
                                <a href="{{ route('post.show', $post->slug) }}" class="btn btn-primary">Read
                                    More</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="row mt-4">
            <div class="col-12">
                {{ $posts->links() }}
            </div>
        </div>
    </div>
@endsection
