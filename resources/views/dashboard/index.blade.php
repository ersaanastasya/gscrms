@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')

<div class="container-fluid">

    {{-- Header --}}
    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>

            <h2 class="fw-bold mb-1">
                Dashboard
            </h2>

            <p class="text-secondary mb-0">
                Global Supply Chain Risk Monitoring System
            </p>

        </div>

        <div class="text-end">

            <small class="text-secondary">

                Last Update

            </small>

            <br>

            <strong>

                {{ now()->format('d M Y H:i') }}

            </strong>

        </div>

    </div>

    <div class="row g-4 mb-4">

    {{-- Total Countries --}}
    <div class="col-xl-3 col-md-6">

        <div class="card shadow-sm border-0 h-100">

            <div class="card-body">

                <div class="d-flex justify-content-between">

                    <div>

                        <small class="text-secondary">
                            Total Countries
                        </small>

                        <h2 class="fw-bold mt-2">

                            {{ $totalCountries ?? 0 }}

                        </h2>

                    </div>

                    <div class="fs-1 text-primary">

                        <i class="bi bi-globe2"></i>

                    </div>

                </div>

            </div>

        </div>

    </div>

    {{-- High Risk --}}
    <div class="col-xl-3 col-md-6">

        <div class="card shadow-sm border-0 h-100">

            <div class="card-body">

                <div class="d-flex justify-content-between">

                    <div>

                        <small class="text-secondary">
                            High Risk Countries
                        </small>

                        <h2 class="fw-bold mt-2 text-danger">

                            {{ $highRiskCountries ?? 0 }}

                        </h2>

                    </div>

                    <div class="fs-1 text-danger">

                        <i class="bi bi-exclamation-triangle-fill"></i>

                    </div>

                </div>

            </div>

        </div>

    </div>

    {{-- Average Risk --}}
    <div class="col-xl-3 col-md-6">

        <div class="card shadow-sm border-0 h-100">

            <div class="card-body">

                <div class="d-flex justify-content-between">

                    <div>

                        <small class="text-secondary">
                            Average Risk
                        </small>

                        <h2 class="fw-bold mt-2 text-warning">

                            {{ $averageRiskScore ?? '--' }}

                        </h2>

                    </div>

                    <div class="fs-1 text-warning">

                        <i class="bi bi-speedometer2"></i>

                    </div>

                </div>

            </div>

        </div>

    </div>

    {{-- Today's News --}}
    <div class="col-xl-3 col-md-6">

        <div class="card shadow-sm border-0 h-100">

            <div class="card-body">

                <div class="d-flex justify-content-between">

                    <div>

                        <small class="text-secondary">
                            Today's News
                        </small>

                        <h2 class="fw-bold mt-2 text-success">

                            {{ $todayNews ?? 0 }}

                        </h2>

                    </div>

                    <div class="fs-1 text-success">

                        <i class="bi bi-newspaper"></i>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

</div>

@endsection

<div class="row g-4 mb-4">

    {{-- World Map --}}
    <div class="col-xl-8">

        <div class="card shadow-sm border-0 h-100">

            <div class="card-header bg-white border-0">

                <h5 class="fw-bold mb-0">
                    Global Weather Monitoring
                </h5>

            </div>

            <div class="card-body">

                <div id="worldMap"
                     style="height:500px;border-radius:12px;">
                </div>

            </div>

        </div>

    </div>

    {{-- Risk Score --}}
    <div class="col-xl-4">

        <div class="card shadow-sm border-0 mb-4">

            <div class="card-header bg-white border-0">

                <h5 class="fw-bold mb-0">
                    Risk Score
                </h5>

            </div>

            <div class="card-body text-center">

                <div class="mx-auto
                            rounded-circle
                            border border-5 border-success
                            d-flex
                            align-items-center
                            justify-content-center"
                     style="width:180px;height:180px;">

                    <div>

                        <h1 class="fw-bold mb-0">

                            {{ $riskScore['score'] ?? '--' }}

                        </h1>

                        <small class="text-secondary">

                            {{ $riskScore['level'] ?? 'No Data' }}

                        </small>

                    </div>

                </div>

                <hr>

                <div class="row">

                    <div class="col-6">

                        <small class="text-secondary">

                            Weather

                        </small>

                        <h6>

                            {{ $riskScore['weather'] ?? '-' }}

                        </h6>

                    </div>

                    <div class="col-6">

                        <small class="text-secondary">

                            Currency

                        </small>

                        <h6>

                            {{ $riskScore['currency'] ?? '-' }}

                        </h6>

                    </div>

                </div>

            </div>

        </div>

        {{-- Selected Country --}}
        <div class="card shadow-sm border-0">

            <div class="card-header bg-white border-0">

                <h5 class="fw-bold mb-0">

                    Selected Country

                </h5>

            </div>

            <div class="card-body">

                <select class="form-select mb-3">

                    @foreach($countries ?? [] as $country)

                        <option>

                            {{ $country->country_name }}

                        </option>

                    @endforeach

                </select>

                <p class="mb-2">

                    GDP :
                    <strong>

                        {{ $statistics['gdp'] ?? '-' }}

                    </strong>

                </p>

                <p class="mb-2">

                    Inflation :
                    <strong>

                        {{ $statistics['inflation'] ?? '-' }}

                    </strong>

                </p>

                <p class="mb-0">

                    Population :
                    <strong>

                        {{ $statistics['population'] ?? '-' }}

                    </strong>

                </p>

            </div>

        </div>

    </div>

</div>
    <!-- =======================================================
        MAP + RISK SCORE
    ======================================================== -->

<div class="row g-4 mb-4">

    {{-- Current Weather --}}
    <div class="col-xl-6">

        <div class="card shadow-sm border-0 h-100">

            <div class="card-header bg-white border-0">

                <h5 class="fw-bold mb-0">
                    Current Weather
                </h5>

            </div>

            <div class="card-body">

                <div class="row align-items-center">

                    <div class="col-4 text-center">

                        <i class="bi bi-cloud-sun-fill text-warning"
                           style="font-size:70px;">
                        </i>

                    </div>

                    <div class="col-8">

                        <h3 class="fw-bold">

                            {{ $weather['temperature'] ?? '--' }} °C

                        </h3>

                        <p class="mb-2">

                            {{ $weather['condition'] ?? '-' }}

                        </p>

                        <small class="text-secondary">

                            Wind :
                            {{ $weather['wind'] ?? '-' }}

                        </small>

                        <br>

                        <small class="text-secondary">

                            Humidity :
                            {{ $weather['humidity'] ?? '-' }}

                        </small>

                    </div>

                </div>

            </div>

        </div>

    </div>

    {{-- Currency --}}
    <div class="col-xl-6">

        <div class="card shadow-sm border-0 h-100">

            <div class="card-header bg-white border-0">

                <h5 class="fw-bold mb-0">
                    Currency Exchange
                </h5>

            </div>

            <div class="card-body">

                <h2 class="fw-bold">

                    {{ $currency['rate'] ?? '-' }}

                </h2>

                <p class="text-secondary">

                    {{ $currency['base'] ?? '-' }}
                    →
                    {{ $currency['target'] ?? '-' }}

                </p>

                <canvas id="currencyChart"
                        height="120">
                </canvas>

            </div>

        </div>

    </div>

</div>

    <!-- =======================================================
        WEATHER + CURRENCY
    ======================================================== -->

    <div class="row g-4 mb-4">

    {{-- GDP Trend --}}
    <div class="col-xl-6">

        <div class="card shadow-sm border-0 h-100">

            <div class="card-header bg-white border-0 d-flex justify-content-between">

                <h5 class="fw-bold mb-0">
                    GDP Trend
                </h5>

                <span class="badge bg-primary">
                    World Bank
                </span>

            </div>

            <div class="card-body">

                <canvas id="gdpChart"
                        height="120">
                </canvas>

            </div>

        </div>

    </div>

    {{-- Inflation Trend --}}
    <div class="col-xl-6">

        <div class="card shadow-sm border-0 h-100">

            <div class="card-header bg-white border-0 d-flex justify-content-between">

                <h5 class="fw-bold mb-0">
                    Inflation Trend
                </h5>

                <span class="badge bg-warning text-dark">
                    %
                </span>

            </div>

            <div class="card-body">

                <canvas id="inflationChart"
                        height="120">
                </canvas>

            </div>

        </div>

    </div>

</div>


<div class="row g-4 mb-4">

    {{-- Currency Trend --}}
    <div class="col-xl-6">

        <div class="card shadow-sm border-0 h-100">

            <div class="card-header bg-white border-0 d-flex justify-content-between">

                <h5 class="fw-bold mb-0">
                    Currency Trend
                </h5>

                <span class="badge bg-success">
                    Exchange Rate
                </span>

            </div>

            <div class="card-body">

                <canvas id="exchangeChart"
                        height="120">
                </canvas>

            </div>

        </div>

    </div>

    {{-- Risk Trend --}}
    <div class="col-xl-6">

        <div class="card shadow-sm border-0 h-100">

            <div class="card-header bg-white border-0 d-flex justify-content-between">

                <h5 class="fw-bold mb-0">
                    Risk Trend
                </h5>

                <span class="badge bg-danger">
                    Risk Engine
                </span>

            </div>

            <div class="card-body">

                <canvas id="riskChart"
                        height="120">
                </canvas>

            </div>

        </div>

    </div>

</div>
        <!-- =======================================================
        CHARTS
    ======================================================== -->

    <div class="row g-4 mb-4">

    {{-- Latest News --}}
    <div class="col-xl-8">

        <div class="card shadow-sm border-0 h-100">

            <div class="card-header bg-white border-0 d-flex justify-content-between align-items-center">

                <h5 class="fw-bold mb-0">
                    Latest News Intelligence
                </h5>

                <a href="#" class="btn btn-primary btn-sm">
                    View All
                </a>

            </div>

            <div class="card-body">

                @forelse($news ?? [] as $item)

                    <div class="border-bottom py-3">

                        <h6 class="fw-semibold">

                            {{ $item['title'] }}

                        </h6>

                        <p class="text-secondary mb-2">

                            {{ $item['description'] }}

                        </p>

                        <small class="text-muted">

                            {{ $item['source'] }}
                            •

                            {{ $item['published_at'] }}

                        </small>

                    </div>

                @empty

                    <div class="text-center py-5">

                        <i class="bi bi-newspaper fs-1 text-secondary"></i>

                        <p class="mt-3 mb-0">

                            No News Available

                        </p>

                    </div>

                @endforelse

            </div>

        </div>

    </div>

    {{-- Top Ports --}}
    <div class="col-xl-4">

        <div class="card shadow-sm border-0 h-100">

            <div class="card-header bg-white border-0">

                <h5 class="fw-bold mb-0">

                    Top Ports

                </h5>

            </div>

            <div class="card-body">

                @forelse($ports ?? [] as $port)

                    <div class="d-flex justify-content-between align-items-center py-3 border-bottom">

                        <div>

                            <strong>

                                {{ $port['name'] }}

                            </strong>

                            <br>

                            <small class="text-secondary">

                                {{ $port['country'] }}

                            </small>

                        </div>

                        <span class="badge bg-success">

                            Active

                        </span>

                    </div>

                @empty

                    <div class="text-center py-5">

                        <i class="bi bi-geo-alt fs-1 text-secondary"></i>

                        <p class="mt-3 mb-0">

                            No Port Data

                        </p>

                    </div>

                @endforelse

            </div>

        </div>

    </div>

</div>
        <!-- =======================================================
        NEWS & PORTS
    ======================================================== -->

    <div class="row g-4 mb-4">

    {{-- Country Summary --}}
    <div class="col-12">

        <div class="card shadow-sm border-0">

            <div class="card-header bg-white border-0">

                <h5 class="fw-bold mb-0">
                    Country Summary
                </h5>

            </div>

            <div class="card-body">

                <div class="row text-center">

                    <div class="col-md-3">

                        <h6 class="text-secondary">
                            Capital
                        </h6>

                        <h5>

                            {{ $selectedCountry['capital'] ?? '-' }}

                        </h5>

                    </div>

                    <div class="col-md-3">

                        <h6 class="text-secondary">
                            Currency
                        </h6>

                        <h5>

                            {{ $selectedCountry['currency'] ?? '-' }}

                        </h5>

                    </div>

                    <div class="col-md-3">

                        <h6 class="text-secondary">
                            Population
                        </h6>

                        <h5>

                            {{ $statistics['population'] ?? '-' }}

                        </h5>

                    </div>

                    <div class="col-md-3">

                        <h6 class="text-secondary">
                            Region
                        </h6>

                        <h5>

                            {{ $selectedCountry['region'] ?? '-' }}

                        </h5>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>


<div class="row g-4 mb-4">

    {{-- High Risk Countries --}}
    <div class="col-xl-6">

        <div class="card shadow-sm border-0 h-100">

            <div class="card-header bg-white border-0 d-flex justify-content-between">

                <h5 class="fw-bold mb-0">
                    High Risk Countries
                </h5>

                <span class="badge bg-danger">
                    Live
                </span>

            </div>

            <div class="card-body">

                @forelse($highRiskList ?? [] as $country)

                    <div class="d-flex justify-content-between align-items-center border-bottom py-3">

                        <div>

                            <strong>

                                {{ $country['country'] }}

                            </strong>

                            <br>

                            <small class="text-secondary">

                                {{ $country['risk_level'] }}

                            </small>

                        </div>

                        <span class="badge bg-danger">

                            {{ $country['risk_score'] }}

                        </span>

                    </div>

                @empty

                    <div class="text-center py-5">

                        <i class="bi bi-shield-exclamation fs-1 text-secondary"></i>

                        <p class="mt-3 mb-0">

                            No High Risk Data

                        </p>

                    </div>

                @endforelse

            </div>

        </div>

    </div>

    {{-- Global Statistics --}}
    <div class="col-xl-6">

        <div class="card shadow-sm border-0 h-100">

            <div class="card-header bg-white border-0">

                <h5 class="fw-bold mb-0">

                    Global Statistics

                </h5>

            </div>

            <div class="card-body">

                <table class="table table-borderless">

                    <tbody>

                        <tr>

                            <td>Total Countries</td>

                            <td class="text-end fw-bold">

                                {{ $totalCountries ?? 0 }}

                            </td>

                        </tr>

                        <tr>

                            <td>High Risk</td>

                            <td class="text-end text-danger fw-bold">

                                {{ $highRiskCountries ?? 0 }}

                            </td>

                        </tr>

                        <tr>

                            <td>Average Risk</td>

                            <td class="text-end fw-bold">

                                {{ $averageRiskScore ?? '--' }}

                            </td>

                        </tr>

                        <tr>

                            <td>Today's News</td>

                            <td class="text-end fw-bold">

                                {{ $todayNews ?? 0 }}

                            </td>

                        </tr>

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</div>

