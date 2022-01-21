@extends('site.layouts.master')

@section('title'){{ $meta->meta_title }}@endsection

@section('description'){{ $meta->meta_description }}@endsection

@section('keywords'){{ $meta->meta_keywords }}@endsection

@section('robots')@if($meta->indexing){{ $meta->indexing }}@else{{ 'index, follow' }}@endif
@endsection

@section('canonical')@if($meta->canonical){{ $meta->canonical }}@else{{ \Illuminate\Support\Facades\URL::current() }}@endif
@endsection

@section('content')

@endsection
