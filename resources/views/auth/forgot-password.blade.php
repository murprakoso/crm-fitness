@extends('layouts.auth')
@section('title', 'Login')
@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h4>{{ __('Email Password Reset Link') }}</h4>
        </div>

        <div class="card-body">

            <div class="mb-4 text-sm text-gray-600">
                {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
            </div>

            <form method="POST" action="{{ route('password.email') }}">
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
                    <button type="submit" class="btn btn-primary btn-block" tabindex="4">
                        {{ __('Email Password Reset Link') }}
                    </button>
                </div>
            </form>
        </div>
    </div>

    {{-- <div class="mt-5 text-muted text-center">
        Don't have an account? <a href="{{ route('register') }}">Create One</a>
    </div> --}}
@endsection

@include('vendor.toastr.toastr')
