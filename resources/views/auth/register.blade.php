@extends('layouts.auth')

@section('title', 'Register - GSCRMS')

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
                Create your account
            </small>

        </div>

        <form method="POST" action="{{ route('register') }}">

            @csrf

            <div class="mb-3">

                <label class="form-label">
                    Full Name
                </label>

                <input
                    type="text"
                    name="name"
                    value="{{ old('name') }}"
                    class="form-control @error('name') is-invalid @enderror"
                    required
                    autofocus>

                @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror

            </div>

            <div class="mb-3">

                <label class="form-label">
                    Email Address
                </label>

                <input
                    type="email"
                    name="email"
                    value="{{ old('email') }}"
                    class="form-control @error('email') is-invalid @enderror"
                    required>

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

            <div class="mb-4">

                <label class="form-label">
                    Confirm Password
                </label>

                <input
                    type="password"
                    name="password_confirmation"
                    class="form-control"
                    required>

            </div>

            <button
                type="submit"
                class="btn btn-primary w-100">

                Register

            </button>

            <div class="text-center mt-4">

                <small class="text-muted">

                    Already have an account?

                    <a href="{{ route('login') }}"
                       class="text-decoration-none">

                        Login here

                    </a>

                </small>

            </div>

        </form>

    </div>

</div>

@endsection