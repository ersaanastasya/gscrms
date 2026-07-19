@extends('layouts.auth')

@section('title', 'Verify Email - GSCRMS')

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
                Verify Your Email Address
            </small>

        </div>

        @if (session('status') == 'verification-link-sent')

            <div class="alert alert-success">

                A new verification link has been sent to your email address.

            </div>

        @endif

        <div class="alert alert-info">

            Thanks for signing up!

            Before getting started, please verify your email address by clicking the link we emailed to you.

            If you didn't receive the email, we can send another one.

        </div>

        <form method="POST" action="{{ route('verification.send') }}">

            @csrf

            <button
                type="submit"
                class="btn btn-primary w-100">

                Resend Verification Email

            </button>

        </form>

        <form method="POST"
              action="{{ route('logout') }}"
              class="mt-3">

            @csrf

            <button
                type="submit"
                class="btn btn-outline-secondary w-100">

                Logout

            </button>

        </form>

    </div>

</div>

@endsection