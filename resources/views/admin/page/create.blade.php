@extends('adminlte::page')

@section('title', 'Create Page')

@php
    $edit = false;
        if(isset($page)){
            $edit = true;
        }
@endphp

@section('content_header')
    <div class="container-fluid d-flex justify-content-between">
        <h1>
            @if($edit)
                Edit Page
            @else
                Create Page
            @endif

        </h1>
    </div>
@stop

@section('content')

    <div class="container-fluid">
        <form
            method="POST"
            action="@if($edit) {{ route('admin.page.update', $page->id) }} @else {{ route('admin.page.store') }} @endif"
        >
            @csrf

            @if($edit)
                @method('PUT')
            @endif
            <h5 class="font-weight-bold text-uppercase">General Info</h5>
            <div class="row mx-0">
                <div class="form-group col-12 col-md-6">
                    <label for="name" class="required">Page Name</label>
                    <input
                        type="text"
                        class="form-control @error('name') is-invalid @enderror"
                        id="name"
                        name="name"
                        placeholder="Enter Page Name"
                        value="@if($edit){{$page->name}}@else{{ old('name') }}@endif"
                        @if(Auth::guard('admin')->user()->role == 'marketing')
                        disabled
                        @endif
                    >
                    @error('name')
                    <div class="invalid-feedback d-block">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="form-group col-12 col-md-6">
                    <label for="slug" class="required">Page Slug</label>
                    <input
                        type="text"
                        class="form-control @error('slug') is-invalid @enderror"
                        id="slug"
                        name="slug"
                        placeholder="Enter Page Slug"
                        value="@if($edit){{$page->slug}}@else{{ old('slug') }}@endif"
                        @if(Auth::guard('admin')->user()->role == 'marketing')
                        disabled
                        @endif
                    >
                    @error('slug')
                    <div class="invalid-feedback d-block">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="form-group col-12">
                    <label for="content">Content</label>
                    <textarea

                        type="text"
                        class="form-control @error('content') is-invalid @enderror"
                        id="content"
                        name="content"
                        placeholder="Enter Page Content"
                    >@if($edit){{$page->content}}@else{{ old('content') }}@endif</textarea>
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
                        placeholder="Enter Page Meta Title"
                        value="@if($edit){{$page->meta_title}}@else{{ old('meta_title') }}@endif"
                    >
                </div>

                <div class="form-group col-12 col-md-6">
                    <label for="meta_description">Meta Description</label>
                    <input
                        type="text"
                        class="form-control @error('meta_description') is-invalid @enderror"
                        id="meta_description"
                        name="meta_description"
                        placeholder="Enter Page Meta Description"
                        value="@if($edit){{$page->meta_description}}@else{{ old('meta_description') }}@endif"
                    >
                </div>

                <div class="form-group col-12 col-md-6">
                    <label for="meta_keywords">Meta Keywords</label>
                    <input
                        type="text"
                        class="form-control @error('meta_keywords') is-invalid @enderror"
                        id="meta_keywords"
                        name="meta_keywords"
                        placeholder="Enter Page Meta Keywords"
                        value="@if($edit){{$page->meta_keywords}}@else{{ old('meta_keywords') }}@endif"
                    >
                </div>

                <div class="form-group col-12 col-md-6">
                    <label for="header">Header Tag (H1)</label>
                    <input
                        type="text"
                        class="form-control @error('header') is-invalid @enderror"
                        id="header"
                        name="header"
                        placeholder="Enter Page Header"
                        value="@if($edit){{$page->header}}@else{{ old('header') }}@endif"
                    >
                </div>

                <div class="form-group col-12 col-md-6">
                    <label for="canonical">Canonical Link</label>
                    <input
                        type="text"
                        class="form-control @error('canonical') is-invalid @enderror"
                        id="canonical"
                        name="canonical"
                        placeholder="Enter Page Canonical Link"
                        value="@if($edit){{$page->canonical}}@else{{ old('canonical') }}@endif"
                    >
                </div>

                <div class="form-group col-12 col-md-6">
                    <label for="image_alt">Image Alt</label>
                    <input
                        type="text"
                        class="form-control @error('image_alt') is-invalid @enderror"
                        id="image_alt"
                        name="image_alt"
                        placeholder="Enter Page Image Alt"
                        value="@if($edit){{$page->image_alt}}@else{{ old('image_alt') }}@endif"
                    >
                </div>

                <div class="form-group col-12 col-md-6">
                    <label for="indexing">Indexing</label>
                    <select
                        class="custom-select @error('indexing') is-invalid @enderror"
                        id="indexing"
                        name="indexing"
                    >
                        <option
                            value="index, follow"
                            @if($edit && $page->indexing == 'index, follow') selected @endif
                        >
                            Index, Follow
                        </option>
                        <option
                            value="noindex, nofollow"
                            @if($edit && $page->indexing == 'noindex, nofollow') selected @endif
                        >
                            No Index, No Follow
                        </option>
                    </select>
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
        CKEDITOR.replace( 'content' );
    </script>
@stop

