@extends('adminlte::page')

@section('title', 'Monitoring')

@section('content_header')
<h1>Global Shipment Monitoring</h1>
@stop

@section('content')

<div class="card">

    <div class="card-header">

        <h3 class="card-title">
            Countries Monitoring
        </h3>

    </div>
    
    <form method="GET">

<div class="row mb-3">

    <div class="col-md-6">

        <input
            type="text"
            class="form-control"
            placeholder="Search Country...">

    </div>

    <div class="col-md-2">

        <button class="btn btn-primary">

            Search

        </button>

    </div>

</div>

</form>
<div class="mb-3">

<strong>Total Countries :</strong>
{{ $shipments->total() }}

</div>

    <div class="card-body table-responsive">

        <table class="table table-bordered table-hover">

            <thead>
<tr>
    <th>No</th>
    <th>Tracking</th>
    <th>Origin</th>
    <th>Destination</th>
    <th>Vessel</th>
    <th>Status</th>
    <th>Risk</th>
    <th>Action</th>
</tr>
</thead>

<tbody>

@foreach($shipments as $shipment)

<tr>

    <td>
        {{ $loop->iteration }}
    </td>

    <td>
        {{ $shipment->tracking_number }}
    </td>

    <td>
        {{ optional($shipment->originPort->country)->name }}
    </td>

    <td>
        {{ optional($shipment->destinationPort->country)->name }}
    </td>

    <td>
        {{ $shipment->vessel_name }}
    </td>

    <td>
        {{ $shipment->status }}
    </td>

    <td>

        @php
            $risk = optional($shipment->riskScore)->risk_level;
        @endphp

        @if($risk == 'High')
            <span class="badge badge-danger">High</span>

        @elseif($risk == 'Medium')
            <span class="badge badge-warning">Medium</span>

        @elseif($risk == 'Low')
            <span class="badge badge-success">Low</span>

        @else
            <span class="badge badge-secondary">Unknown</span>
        @endif

    </td>

    <td>

        <a href="{{ route('monitoring.show',$shipment->id) }}"
           class="btn btn-primary btn-sm">

            Detail

        </a>

    </td>

</tr>

@endforeach

</tbody>

        </table>

    </div>

    <div class="card-footer">

        {{ $shipments->links() }}

    </div>

</div>

@stop