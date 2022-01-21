@extends('adminlte::page')

@section('title', 'Create Vision')

@php
    $edit = false;
    if(isset($vision)){
    $edit = true;
    }
@endphp

@section('content_header')
    <div class="container-fluid d-flex justify-content-between">
        <h1>
            @if($edit)
                Edit Vision
            @else
                Create Vision
            @endif

        </h1>
    </div>
@stop

@section('content')
    <script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>

    <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-md-12">
                <form method="POST"
                      action="@if($edit) {{ route('admin.vision.update', $vision->id) }} @else {{ route('admin.vision.store') }} @endif">
                    @csrf

                    @if($edit)
                        @method('PUT')
                    @endif

                    <div class="form-group w-50">
                        <label for="title" class="required">Vision Title</label>
                        <input
                            type="text"
                            class="form-control @error('title') is-invalid @enderror"
                            id="title"
                            name="title"
                            placeholder="Enter Vision Title"
                            value="@if($edit){{$vision->title}}@else{{ old('title') }}@endif"
                        >
                        @error('title')
                        <div class="invalid-feedback d-block">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="form-group w-50">
                        <label for="position" class="required">Vision Position</label>
                        <input
                            type="number"
                            class="form-control @error('position') is-invalid @enderror"
                            id="position"
                            name="position"
                            placeholder="Enter Vision Position"
                            value="@if($edit){{$vision->position}}@else{{ old('position') }}@endif"
                        >
                        @error('position')
                        <div class="invalid-feedback d-block">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="description" class="required">Description</label>
                        <textarea
                            cols="30"
                            rows="10"
                            class="form-control @error('description') is-invalid @enderror"
                            id="description"
                            name="description"
                            placeholder="Enter description"
                        >@if($edit){{$vision->description}}@else{{ old('description') }}@endif</textarea>
                        @error('description')
                        <div class="invalid-feedback d-block">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
    <script>
        CKEDITOR.replace('description');
    </script>
@stop

@section('css')
    <style>
        .required:after {
            content: '*';
            color: orangered;
        }
    </style>
@stop
