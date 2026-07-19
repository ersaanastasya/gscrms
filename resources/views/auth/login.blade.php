@extends('layouts.auth')

@section('title', 'Login - GSCRMS')

@section('content')

<div class="card shadow-lg border-0 rounded-4">

    <div class="card-body p-5">

        <div class="text-center mb-4">

            <h2 class="fw-bold text-primary">
                GSCRMS
            </h2>

            <p class="text-muted mb-0">
                Global Supply Chain Risk Monitoring System
            </p>

            <small class="text-secondary">
                Please sign in to continue
            </small>

        </div>

        @if(session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">

            @csrf

            <div class="mb-3">

                <label class="form-label">
                    Email Address
                </label>

                <input
                    type="email"
                    name="email"
                    value="{{ old('email') }}"
                    class="form-control @error('email') is-invalid @enderror"
                    required
                    autofocus>

                @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror

            </div>

            <div class="mb-3">

                <label class="form-label">
                    Password
                </label>

                <input
                    type="password"
                    name="password"
                    class="form-control @error('password') is-invalid @enderror"
                    required>

                @error('password')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror

            </div>

            <div class="form-check mb-4">

                <input
                    class="form-check-input"
                    type="checkbox"
                    name="remember"
                    id="remember">

                <label
                    class="form-check-label"
                    for="remember">

                    Remember Me

                </label>

            </div>

            <button
                type="submit"
                class="btn btn-primary w-100">

                Login

            </button>

            @if (Route::has('password.request'))

                <div class="text-center mt-3">

                    <a href="{{ route('password.request') }}"
                       class="text-decoration-none">

                        Forgot your password?

                    </a>

                </div>

            @endif

        </form>

    </div>

</div>

@endsection