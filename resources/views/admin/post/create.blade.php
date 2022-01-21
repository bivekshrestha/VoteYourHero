@extends('adminlte::page')

@section('title', 'Create Post')

@php
    $edit = false;
        if(isset($post)){
            $edit = true;
        }
@endphp

@section('content_header')
    <div class="container-fluid d-flex justify-content-between">
        <h1>
            @if($edit)
                Edit Post
            @else
                Create Post
            @endif

        </h1>
    </div>
@stop

@section('content')

    <div class="container-fluid">
        <form
            method="POST"
            class="pb-5"
            action="@if($edit) {{ route('admin.post.update', $post->id) }} @else {{ route('admin.post.store') }} @endif"
            enctype="multipart/form-data"
        >
            @csrf

            @if($edit)
                @method('PUT')
            @endif

            <h5 class="font-weight-bold text-uppercase">Image</h5>
            <div class="row mx-0">
                <div class="col-12">
                    <img
                        id="preview_img"
                        src="{{ $edit && $post->image ? asset('storage/'. $post->image->path) : asset('images/upload-1.png') }}"
                        alt="preview"
                        style="height: 400px; width: 100%"
                    >
                </div>
                <div class="form-group col-12 col-md-6">
                    <label
                        class="form-control-label required"
                        for="input-image">
                        {{ __('Blog Image') }}
                    </label>
                    <input
                        type="file"
                        name="image"
                        id="input-image"
                        class="form-control-file form-control-alternative {{ $errors->has('image') ? ' is-invalid' : '' }}"
                        value="{{ $edit && $post->image() ? $post->image->path : old('image') }}"
                        onchange="loadPreview(this);"
                    >

                    @error ('image')
                    <div class="invalid-feedback d-block" role="alert">
                        <strong>{{ $message }}</strong>
                    </div>
                    @enderror
                </div>
            </div>

            <h5 class="font-weight-bold text-uppercase">General Info</h5>
            <div class="row mx-0">
                <div class="form-group col-12 col-md-6">
                    <label for="title" class="required">Post Title</label>
                    <input
                        type="text"
                        class="form-control @error('title') is-invalid @enderror"
                        id="title"
                        name="title"
                        placeholder="Enter Post Title"
                        value="@if($edit){{$post->title}}@else{{ old('title') }}@endif"
                    >
                    @error('title')
                    <div class="invalid-feedback d-block">
                        {{ $message }}
                    </div>
                    @enderror
                </div>


                <div class="form-group col-12">
                    <label for="description">Post Description</label>
                    <textarea
                        type="text"
                        class="form-control @error('description') is-invalid @enderror"
                        id="description"
                        name="description"
                        placeholder="Enter Post Description"
                    >@if($edit){{$post->description}}@else{{ old('description') }}@endif</textarea>
                    @error('description')
                    <div class="invalid-feedback d-block">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>

            <hr>

            <h5 class="font-weight-bold text-uppercase">SEO</h5>
            <div class="row mx-0">

                <div class="form-group col-12 col-md-6">
                    <label for="meta_title">Meta Title</label>
                    <input
                        type="text"
                        class="form-control @error('meta_title') is-invalid @enderror"
                        id="meta_title"
                        name="meta_title"
                        placeholder="Enter Post Meta Title"
                        value="@if($edit){{$post->meta_title}}@else{{ old('meta_title') }}@endif"
                    >
                </div>

                <div class="form-group col-12 col-md-6">
                    <label for="meta_description">Meta Description</label>
                    <input
                        type="text"
                        class="form-control @error('meta_description') is-invalid @enderror"
                        id="meta_description"
                        name="meta_description"
                        placeholder="Enter Post Meta Description"
                        value="@if($edit){{$post->meta_description}}@else{{ old('meta_description') }}@endif"
                    >
                </div>

                <div class="form-group col-12 col-md-6">
                    <label for="meta_keywords">Meta Keywords</label>
                    <input
                        type="text"
                        class="form-control @error('meta_keywords') is-invalid @enderror"
                        id="meta_keywords"
                        name="meta_keywords"
                        placeholder="Enter Post Meta Keywords"
                        value="@if($edit){{$post->meta_keywords}}@else{{ old('meta_keywords') }}@endif"
                    >
                </div>

                <div class="col-12">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </form>
    </div>
@stop

@section('css')
    <style>
        .required:after {
            content: '*';
            color: orangered;
        }
    </style>
@stop

@section('js')
    <script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('description');
    </script>
    <script>
        function loadPreview(input, id) {
            id = id || '#preview_img';
            if (input.files && input.files[0]) {
                let reader = new FileReader();

                reader.onload = function (e) {
                    $(id)
                        .attr('src', e.target.result)
                        .height(400);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
@stop
