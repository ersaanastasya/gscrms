@extends('adminlte::page')

@section('title','Monitoring Detail')

@section('content_header')
<h1>{{ $country->name }}</h1>
@stop

@section('content')

<div class="card">

    <div class="card-body">

        <div class="text-center">

            <img src="{{ $country->flag }}" width="180">

            <h3 class="mt-3">
                {{ $country->name }}
            </h3>

        </div>

        <table class="table table-bordered mt-4">

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
                <th>Status</th>
                <td>

                    <span class="badge badge-success">

                        Normal

                    </span>

                </td>
            </tr>

        </table>

        <a href="{{ route('monitoring.index') }}"
           class="btn btn-secondary">

            Back

        </a>

    </div>

</div>

@stop