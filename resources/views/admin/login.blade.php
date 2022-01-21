<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Admin Login | 208 journey to everest</title>

    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
</head>
<body style="height: 100vh">
@include('sweetalert::alert')
<div class="container h-100">
    <div class="row h-100 justify-content-center align-items-center">
        <div class="col-12 col-md-4">
            <h2 class="text-center">208 Heroes</h2>
            <div class="card">
                <div class="card-body">
                    <form
                        method="POST"
                        action="{{ route('admin.login') }}"
                    >
                        @csrf

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input
                                type="email"
                                class="form-control @error('password') is-invalid @enderror"
                                id="email"
                                name="email"
                                value="{{ old('email') }}"
                            >
                            @error('email')
                            <div class="invalid-feedback d-block">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="password">Password</label>
                            <input
                                type="password"
                                class="form-control @error('password') is-invalid @enderror"
                                id="password"
                                name="password"
                            >
                            @error('password')
                            <div class="invalid-feedback d-block">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        @if(Session::has('login_error'))
                        <div class="invalid-feedback d-block my-2">
                            {{ Session::get('login_error') }}
                        </div>
                        @endif

                        <button type="submit" class="btn btn-primary">Login</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<div>


</div>
<!-- Scripts -->
<script src="{{ mix('js/app.js') }}"></script>
</body>
</html>
