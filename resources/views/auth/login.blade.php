@extends('layouts.auth')
@section('title', 'Login')
@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h4>Login</h4>
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="form-group">
                    <label for="email">Email</label>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                        tabindex="1" autofocus value="{{ old('email') }}">

                    @error('email')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>


                <div class="form-group">
                    <label for="password" class="d-block">Password
                        @if (Route::has('password.request'))
                            <div class="float-right">
                                <a href="{{ route('password.request') }}">
                                    Forgot Password?
                                </a>
                            </div>
                        @endif
                    </label>

                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                        name="password" tabindex="2" required value="{{ old('password') }}">

                    @error('password')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-group">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" name="remember" class="custom-control-input" tabindex="3" id="remember_me">
                        <label class="custom-control-label" for="remember_me">Remember Me</label>
                    </div>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block" tabindex="4">
                        Login
                    </button>
                </div>
            </form>
        </div>
    </div>

    {{-- <div class="mt-5 text-muted text-center">
        Don't have an account? <a href="{{ route('register') }}">Create One</a>
    </div> --}}
@endsection
