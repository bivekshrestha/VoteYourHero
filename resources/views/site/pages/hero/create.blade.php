@extends('site.layouts.master')

@section('title')
Create Hero
@endsection

@section('description')
@endsection

@section('keywords')
@endsection

@section('content')

<div class="row justify-content-center tb_spacing">
    <div class="col-12 col-md-5">
        <div class="card">
            <div class="card-body">
                <h1>Create Your Hero</h1>
                <form method="POST" enctype="multipart/form-data" id="hero_submit" action="{{ route('hero.store') }}">
                    @csrf

                    <div class="row mx-0">

                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="country_id" class="required">Country</label>
                                <select class="custom-select  @error('name') is-invalid @enderror" id="country_id"
                                    name="country_id">
                                    @foreach($countries as $country)
                                    <option value="{{ $country->id }}" @if($selected && $selected==$country->id)
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
                        </div>

                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="first_name" class="required">First Name</label>
                                <input type="text" class="form-control  @error('first_name') is-invalid @enderror"
                                    id="first_name" name="first_name" placeholder="Enter hero's first name"
                                    value="{{ old('first_name') }}">

                                @error('first_name')
                                <div class="invalid-feedback d-block">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="middle_name">Middle Name</label>
                                <input type="text" class="form-control  @error('middle_name') is-invalid @enderror"
                                    id="middle_name" name="middle_name" placeholder="Enter hero's middle name"
                                    value="{{ old('middle_name') }}">
                            </div>
                        </div>

                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="last_name" class="required">Last Name</label>
                                <input type="text" class="form-control  @error('last_name') is-invalid @enderror"
                                    id="last_name" name="last_name" placeholder="Enter hero's last name"
                                    value="{{ old('last_name') }}">

                                @error('last_name')
                                <div class="invalid-feedback d-block">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="profession" class="required">Profession</label>
                                <input type="text" class="form-control  @error('profession') is-invalid @enderror"
                                    id="profession" name="profession" placeholder="Enter hero's profession"
                                    value="{{ old('profession') }}">

                                @error('profession')
                                <div class="invalid-feedback d-block">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="identity" class="required">Company/Category</label>
                                <input type="text" class="form-control  @error('identity') is-invalid @enderror"
                                    id="identity" name="identity" placeholder="Enter hero's identity"
                                    value="{{ old('identity') }}">

                                @error('identity')
                                <div class="invalid-feedback d-block">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="contribution" class="required">Contribution</label>
                                <textarea class="form-control  @error('contribution') is-invalid @enderror"
                                    id="contribution" name="contribution"
                                    placeholder="Why you choose this hero?">{{ old('contribution') }}</textarea>

                                @error('contribution')
                                <div class="invalid-feedback d-block">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="photo" class="required">Photo</label>
                                <input type="file" class="form-control-file" id="photo" name="photo" accept="image/*">

                                @error('photo')
                                <div class="invalid-feedback d-block">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12 col-md-12">
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary" value="Create hero">
                            </div>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
