@extends('layouts.auth')

@section('title', 'Reset Password - GSCRMS')

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
                Create a new password
            </small>

        </div>

        <form method="POST" action="{{ route('password.store') }}">

            @csrf

            <input
                type="hidden"
                name="token"
                value="{{ request()->route('token') }}">

            <div class="mb-3">

                <label class="form-label">
                    Email Address
                </label>

                <input
                    type="email"
                    name="email"
                    value="{{ old('email', request('email')) }}"
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
                    New Password
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

                Reset Password

            </button>

        </form>

        <div class="text-center mt-4">

            <a href="{{ route('login') }}"
               class="text-decoration-none">

                ← Back to Login

            </a>

        </div>

    </div>

</div>

@endsection