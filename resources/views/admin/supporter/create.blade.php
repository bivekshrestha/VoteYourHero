@extends('adminlte::page')

@section('title', 'Create Supporter')

@php
    $edit = false;
        if(isset($supporter)){
            $edit = true;
        }
@endphp

@section('content_header')
    <div class="container-fluid d-flex justify-content-between">
        <h1>
            @if($edit)
                Edit Supporter
            @else
                Create Supporter
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
                    action="@if($edit) {{ route('admin.supporter.update', $supporter->id) }} @else {{ route('admin.supporter.store') }} @endif"
                >
                    @csrf

                    @if($edit)
                        @method('PUT')
                    @endif

                    <div class="form-group">
                        <label for="country_id" class="required">Country</label>
                        <select
                            class="custom-select  @error('country_id') is-invalid @enderror" id="country_id"
                            name="country_id"
                        >
                            @foreach($countries as $country)
                                <option
                                    value="{{ $country->id }}"
                                    @if($edit && $supporter->country_id==$country->id)
                                    selected
                                    @elseif(old('country_id') == $country->id)
                                    selected
                                    @endif
                                >
                                    {{ $country->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="name" class="required">Supporter Name</label>
                        <input
                            type="text"
                            class="form-control @error('name') is-invalid @enderror"
                            id="name"
                            name="name"
                            placeholder="Enter Supporter Name"
                            value="@if($edit){{$supporter->name}}@else{{ old('name') }}@endif"
                        >
                        @error('name')
                        <div class="invalid-feedback d-block">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="type" class="required">Supporter Type</label>
                        <select
                            class="custom-select @error('type') is-invalid @enderror"
                            id="type"
                            name="type"
                        >
                            <option
                                value="sponsor"
                                @if($edit && $supporter->type == 'sponsor')
                                selected
                                @elseif(old('type') == 'sponsor')
                                selected
                                @endif
                            >
                                Sponsor
                            </option>

                            <option
                                value="producer"
                                @if($edit && $supporter->type == 'producer')
                                selected
                                @elseif(old('type') == 'producer')
                                selected
                                @endif
                            >
                                Producer
                            </option>
                        </select>

                        @error('type')
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
