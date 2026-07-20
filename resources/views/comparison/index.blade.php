@extends('adminlte::page')

@section('title', 'Comparison')

@section('content_header')
<h1>Country Comparison</h1>
@stop

@section('content')

<div class="card">

    <div class="card-header">
        <h3 class="card-title">
            Compare Two Countries
        </h3>
    </div>

    <div class="card-body">

        <form method="POST" action="{{ route('comparison.compare') }}">

            @csrf

            <div class="row">

                <div class="col-md-5">

                    <label>Country 1</label>

                    <select name="country1" class="form-control">

                        @foreach($countries as $country)

                            <option value="{{ $country->id }}">

                                {{ $country->name }}

                            </option>

                        @endforeach

                    </select>

                </div>

                <div class="col-md-5">

                    <label>Country 2</label>

                    <select name="country2" class="form-control">

                        @foreach($countries as $country)

                            <option value="{{ $country->id }}">

                                {{ $country->name }}

                            </option>

                        @endforeach

                    </select>

                </div>

                <div class="col-md-2">

                    <label>&nbsp;</label>

                    <button class="btn btn-primary btn-block">

                        Compare

                    </button>

                </div>

            </div>

        </form>

    </div>

</div>

@if(isset($country1))

<div class="card">

    <div class="card-header">

        <h3 class="card-title">

            Comparison Result

        </h3>

    </div>

    <div class="card-body">

        <table class="table table-bordered">

            <tr>
                <th>Attribute</th>
                <th>{{ $country1->name }}</th>
                <th>{{ $country2->name }}</th>
            </tr>

            <tr>
                <th>Capital</th>
                <td>{{ $country1->capital }}</td>
                <td>{{ $country2->capital }}</td>
            </tr>

            <tr>
                <th>Region</th>
                <td>{{ $country1->region }}</td>
                <td>{{ $country2->region }}</td>
            </tr>

            <tr>
                <th>Sub Region</th>
                <td>{{ $country1->subregion }}</td>
                <td>{{ $country2->subregion }}</td>
            </tr>

            <tr>
                <th>Currency</th>
                <td>{{ $country1->currency }}</td>
                <td>{{ $country2->currency }}</td>
            </tr>

            <tr>
    <th>Shipment Status</th>

    <td>{{ optional($shipment1)->status ?? '-' }}</td>

    <td>{{ optional($shipment2)->status ?? '-' }}</td>
</tr>

<tr>
    <th>Risk Level</th>

    <td>

        @if(optional(optional($shipment1)->riskScore)->risk_level == 'High')
            <span class="badge badge-danger">High</span>

        @elseif(optional(optional($shipment1)->riskScore)->risk_level == 'Medium')
            <span class="badge badge-warning">Medium</span>

        @elseif(optional(optional($shipment1)->riskScore)->risk_level == 'Low')
            <span class="badge badge-success">Low</span>

        @else
            -
        @endif

    </td>

    <td>

        @if(optional(optional($shipment2)->riskScore)->risk_level == 'High')
            <span class="badge badge-danger">High</span>

        @elseif(optional(optional($shipment2)->riskScore)->risk_level == 'Medium')
            <span class="badge badge-warning">Medium</span>

        @elseif(optional(optional($shipment2)->riskScore)->risk_level == 'Low')
            <span class="badge badge-success">Low</span>

        @else
            -
        @endif

    </td>

</tr>

<tr>

    <th>Recommendation</th>

    <td>{{ optional(optional($shipment1)->riskScore)->recommendation ?? '-' }}</td>

    <td>{{ optional(optional($shipment2)->riskScore)->recommendation ?? '-' }}</td>

</tr>

        </table>

    </div>

</div>

@endif

@stop