@extends('adminlte::page')

@section('title', 'Create Setting')

@php
    $edit = false;
        if(isset($setting)){
            $edit = true;
        }
@endphp

@section('content_header')
    <div class="container-fluid d-flex justify-content-between">
        <h1>
            @if($edit)
                Edit Setting
            @else
                Create Setting
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
                    action="@if($edit) {{ route('admin.setting.update', $setting->id) }} @else {{ route('admin.setting.store') }} @endif"
                >
                    @csrf

                    @if($edit)
                        @method('PUT')
                    @endif

                    <div class="form-group">
                        <label for="key" class="required">Setting Key</label>
                        <input
                            type="text"
                            class="form-control @error('key') is-invalid @enderror"
                            id="key"
                            name="key"
                            placeholder="Enter Setting Key"
                            value="@if($edit){{$setting->key}}@else{{ old('key') }}@endif"
                        >
                        @error('key')
                        <div class="invalid-feedback d-block">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="value" class="required">Setting Value</label>
                        <input
                            type="text"
                            class="form-control @error('value') is-invalid @enderror"
                            id="value"
                            name="value"
                            placeholder="Enter Setting Value"
                            value="@if($edit){{$setting->value}}@else{{ old('value') }}@endif"
                        >
                        @error('value')
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
