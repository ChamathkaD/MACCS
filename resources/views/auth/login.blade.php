@extends('layouts.auth')

@section('content')
    <div class="bg-image" style="background-image: url({{ asset('assets/media/photos/photo6@2x.jpg') }});">
        <div class="hero-static bg-white-95">
            <div class="content">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-4">
                        <!-- Sign In Block -->
                        <div class="block block-themed block-fx-shadow mb-0">
                            <div class="block-header">
                                <h3 class="block-title">
                                    {{ isset($url) ? ucwords($url) : '' }}
                                    Login
                                </h3>
                                @if (Route::has('password.request'))
                                    <div class="block-options">
                                        <a class="btn-block-option font-size-sm" href="{{ route('password.request') }}">Forgot Password?</a>
                                    </div>
                                @endif
                            </div>
                            <div class="block-content">
                                <div class="p-sm-3 px-lg-4 py-lg-5">
                                    <h1 class="mb-2">{{ config('app.name') }}</h1>
                                    <p>Welcome, please login.</p>

                                    @isset($url)
                                        <form method="POST" action="{{ url("login/$url") }}">
                                    @else
                                        <form method="POST" action="{{ route('login') }}">
                                    @endisset

                                        @csrf

                                        <div class="py-3">
                                            <div class="form-group">
                                                <input
                                                    type="email"
                                                    class="form-control form-control-alt form-control-lg @error('email') is-invalid @enderror"
                                                    name="email"
                                                    value="{{ old('email') }}"
                                                    placeholder="Email"
                                                    autocomplete="email"
                                                    required
                                                >
                                                @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <input
                                                    type="password"
                                                    class="form-control form-control-alt form-control-lg @error('password') is-invalid @enderror"
                                                    name="password"
                                                    placeholder="Password"
                                                    required
                                                    autocomplete="current-password"
                                                >
                                                @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <div class="custom-control custom-checkbox">
                                                    <input
                                                        type="checkbox"
                                                        class="custom-control-input"
                                                        name="remember"
                                                        id="remember"
                                                        {{ old('remember') ? 'checked' : '' }}
                                                    >
                                                    <label class="custom-control-label font-w400" for="login-remember">{{ __('Remember Me') }}</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-6 col-xl-5">
                                                <button type="submit" class="btn btn-block btn-primary">
                                                    <i class="fa fa-fw fa-sign-in-alt mr-1"></i> Login
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                    <!-- END Sign In Form -->
                                </div>
                            </div>
                        </div>
                        <!-- END Sign In Block -->
                    </div>
                </div>
            </div>
            <div class="content content-full font-size-sm text-muted text-center">
                <strong>{{ config('app.name') }} 1.0</strong> &copy; <span data-toggle="year-copy">2020</span>
            </div>
        </div>
    </div>
@endsection
