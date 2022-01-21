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
        <div class="row">
            <div class="col-12 col-md-6">
                <form
                    method="POST"
                    action="@if($edit) {{ route('admin.page.update', $page->id) }} @else {{ route('admin.page.store') }} @endif"
                >
                    @csrf

                    @if($edit)
                        @method('PUT')
                    @endif
                    <div class="form-group">
                        <label for="name" class="required">Page Name</label>
                        <input
                            type="text"
                            class="form-control @error('name') is-invalid @enderror"
                            id="name"
                            name="name"
                            placeholder="Enter Page Name"
                            value="@if($edit){{$page->name}}@else{{ old('name') }}@endif"
                        >
                        @error('name')
                        <div class="invalid-feedback d-block">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="meta_title">Meta Title</label>
                        <input
                            type="text"
                            class="form-control @error('name') is-invalid @enderror"
                            id="meta_title"
                            name="meta_title"
                            placeholder="Enter Page Meta Title"
                        >
                    </div>

                    <div class="form-group">
                        <label for="meta_description">Meta Description</label>
                        <input
                            type="text"
                            class="form-control @error('name') is-invalid @enderror"
                            id="meta_description"
                            name="meta_description"
                            placeholder="Enter Page Meta Description"
                        >
                    </div>

                    <div class="form-group">
                        <label for="meta_keywords">Meta Keywords</label>
                        <input
                            type="text"
                            class="form-control @error('name') is-invalid @enderror"
                            id="meta_keywords"
                            name="meta_keywords"
                            placeholder="Enter Page Meta Keywords"
                        >
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
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
