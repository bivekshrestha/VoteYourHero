@extends('adminlte::page')

@section('title', 'Create Team')

@php
    $edit = false;
        if(isset($team)){
            $edit = true;
        }
@endphp

@section('content_header')
    <div class="container-fluid d-flex justify-content-between">
        <h1>
            @if($edit)
                Edit Team
            @else
                Create Team
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
                    action="@if($edit) {{ route('admin.team.update', $team->id) }} @else {{ route('admin.team.store') }} @endif"
                >
                    @csrf

                    @if($edit)
                        @method('PUT')
                    @endif

                    <div class="form-group">
                        <label for="name" class="required">Full Name</label>
                        <input
                            type="text"
                            class="form-control @error('name') is-invalid @enderror"
                            id="name"
                            name="name"
                            placeholder="Enter Full Name"
                            value="@if($edit){{$team->name}}@else{{ old('name') }}@endif"
                        >
                        @error('name')
                        <div class="invalid-feedback d-block">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="type" class="required">Team Type</label>
                        <input
                            type="text"
                            class="form-control @error('type') is-invalid @enderror"
                            id="type"
                            name="type"
                            placeholder="Enter Team Value"
                            value="@if($edit){{$team->type}}@else{{ old('type') }}@endif"
                        >
                        @error('type')
                        <div class="invalid-feedback d-block">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="link" class="">Team Link</label>
                        <input
                            type="text"
                            class="form-control @error('type') is-invalid @enderror"
                            id="link"
                            name="link"
                            placeholder="Enter Team Link"
                            value="@if($edit){{$team->link}}@else{{ old('link') }}@endif"
                        >
                        @error('link')
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
@stop

@section('css')
    <style>
        .required:after {
            content: '*';
            color: orangered;
        }
    </style>
@stop
