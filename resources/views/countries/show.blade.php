@extends('adminlte::page')

@section('title', 'Country Detail')

@section('content_header')
<h1>Country Detail</h1>
@stop

@section('content')

<div class="card">

    <div class="card-header">

        <h3 class="card-title">

            {{ $country->name }}

        </h3>

    </div>

    <div class="card-body">

        <div class="text-center mb-4">

            <img src="{{ $country->flag }}" width="180">

        </div>

        <table class="table table-bordered">

            <tr>
                <th width="250">Code</th>
                <td>{{ $country->code }}</td>
            </tr>

            <tr>
                <th>Country</th>
                <td>{{ $country->name }}</td>
            </tr>

            <tr>
                <th>Capital</th>
                <td>{{ $country->capital }}</td>
            </tr>

            <tr>
                <th>Region</th>
                <td>{{ $country->region }}</td>
            </tr>

            <tr>
                <th>Sub Region</th>
                <td>{{ $country->subregion }}</td>
            </tr>

            <tr>
                <th>Currency</th>
                <td>{{ $country->currency }}</td>
            </tr>

            <tr>
                <th>Currency Code</th>
                <td>{{ $country->currency_code }}</td>
            </tr>

            <tr>
                <th>Latitude</th>
                <td>{{ $country->latitude }}</td>
            </tr>

            <tr>
                <th>Longitude</th>
                <td>{{ $country->longitude }}</td>
            </tr>

        </table>

    </div>

    <div class="card-footer">

        <a href="{{ route('countries.index') }}"
           class="btn btn-secondary">

            Back

        </a>

    </div>

</div>

@stop