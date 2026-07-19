@extends('layouts.auth')

@section('title', 'Forgot Password - GSCRMS')

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
                Forgot your password?
            </small>

        </div>

        <div class="alert alert-info">

            Enter your email address below and we'll send you a password reset link.

        </div>

        @if (session('status'))

            <div class="alert alert-success">

                {{ session('status') }}

            </div>

        @endif

        <form method="POST" action="{{ route('password.email') }}">

            @csrf

            <div class="mb-4">

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

            <button
                type="submit"
                class="btn btn-primary w-100">

                Send Password Reset Link

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