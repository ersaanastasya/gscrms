@extends('layouts.auth')

@section('title', 'Confirm Password - GSCRMS')

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
                Confirm Your Password
            </small>

        </div>

        <div class="alert alert-info">

            This is a secure area of the application.
            Please confirm your password before continuing.

        </div>

        <form method="POST" action="{{ route('password.confirm') }}">

            @csrf

            <div class="mb-4">

                <label class="form-label">

                    Password

                </label>

                <input
                    type="password"
                    name="password"
                    class="form-control @error('password') is-invalid @enderror"
                    required
                    autofocus>

                @error('password')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror

            </div>

            <button
                type="submit"
                class="btn btn-primary w-100">

                Confirm Password

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