@extends('adminlte::page')

@section('title', 'Change Password')

@section('content_header')
    <h1>Change Password</h1>
@stop

@section('content')

    <div class="container-fluid">
        <form
            method="POST"
            action="{{ route('admin.password') }}"
        >
            @csrf
            @method('PUT')

            <div class="form-group col-12 col-md-6">
                <label for="old_password" class="required">Old Password</label>
                <input
                    type="password"
                    class="form-control password_input @error('old_password') is-invalid @enderror"
                    id="old_password"
                    name="old_password"
                    placeholder="Enter your old password"
                    value="{{ old('old_password') }}"
                >
                @error('old_password')
                <div class="invalid-feedback d-block">
                    {{ $message }}
                </div>
                @enderror

                @if(Session::has('password_error'))
                    <div class="invalid-feedback d-block">
                        {{ Session::get('password_error') }}
                    </div>
                @endif
            </div>

            <div class="form-group col-12 col-md-6">
                <label for="password" class="required">New Password</label>
                <input
                    type="password"
                    class="form-control password_input @error('password') is-invalid @enderror"
                    id="password"
                    name="password"
                    placeholder="Enter new password"
                >
                @error('password')
                <div class="invalid-feedback d-block">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="form-group col-12 col-md-6">
                <label for="password_confirmation" class="required">Password Confirmation</label>
                <input
                    type="password"
                    class="form-control password_input @error('password_confirmation') is-invalid @enderror"
                    id="password_confirmation"
                    name="password_confirmation"
                    placeholder="Enter new password again"
                >
                @error('password_confirmation')
                <div class="invalid-feedback d-block">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="form-group col-12 col-md-6">
                <input type="checkbox" onclick="showPassword()">Show Password
            </div>

            <div class="form-group col-12 col-md-6">
                <button type="submit" class="btn btn-primary">Submit</button>
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
    <script>
        function showPassword() {
            let inputs = document.getElementsByClassName('password_input');
            console.log(inputs[0].type);
            for (let i = 0; i < inputs.length; i++) {
                if (inputs[i].type == "password") {
                    inputs[i].type = "text";
                } else {
                    inputs[i].type = "password";
                }

            }

            console.log(inputs[0].type);

        }
    </script>
@stop
