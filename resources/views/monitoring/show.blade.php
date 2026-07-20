@extends('adminlte::page')

@section('title', 'Monitoring Detail')

@section('css')
<link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css"/>

<style>
    #shipmentMap{
        height: 550px;
        border-radius: 10px;
    }
</style>
@stop

@section('content_header')
<h1>Monitoring Detail</h1>
@stop

@section('content')

<div class="row">

    <div class="col-md-4">

        <div class="card card-primary">

            <div class="card-header">
                <h3 class="card-title">Shipment Information</h3>
            </div>

            <div class="card-body">

                <table class="table table-bordered">

                    <tr>
                        <th width="40%">Shipment ID</th>
                        <td>{{ $shipment->id }}</td>
                    </tr>

                    <tr>
                        <th>Origin Port</th>
                        <td>{{ $shipment->originPort->name }}</td>
                    </tr>

                    <tr>
                        <th>Origin Country</th>
                        <td>{{ $shipment->originPort->country->name }}</td>
                    </tr>

                    <tr>
                        <th>Destination Port</th>
                        <td>{{ $shipment->destinationPort->name }}</td>
                    </tr>

                    <tr>
                        <th>Destination Country</th>
                        <td>{{ $shipment->destinationPort->country->name }}</td>
                    </tr>

                    <tr>
                        <th>Risk Score</th>
                        <td>
                            {{ optional($shipment->riskScore)->score ?? '-' }}
                        </td>
                    </tr>

                    <tr>
                        <th>Status</th>
                        <td>

                            @php
                                $status = optional($shipment->riskScore)->level ?? 'Normal';
                            @endphp

                            @if($status == 'High')
                                <span class="badge badge-danger">High</span>
                            @elseif($status == 'Medium')
                                <span class="badge badge-warning">Medium</span>
                            @else
                                <span class="badge badge-success">Normal</span>
                            @endif

                        </td>
                    </tr>

                </table>

                <a href="{{ route('monitoring.index') }}"
                   class="btn btn-secondary mt-3">
                    Back
                </a>

            </div>

        </div>

    </div>

    <div class="col-md-8">

        <div class="card card-info">

            <div class="card-header">
                <h3 class="card-title">Shipment Route Map</h3>
            </div>

            <div class="card-body">

                <div id="shipmentMap"></div>

            </div>

        </div>

    </div>

</div>

@stop

@section('js')

<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>

<script>

var map = L.map('shipmentMap').setView([
    {{ $currentLat }},
    {{ $currentLng }}
],4);

L.tileLayer(
'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png',
{
    maxZoom:18,
    attribution:'© OpenStreetMap'
}
).addTo(map);

var origin = L.marker([
    {{ $originLat }},
    {{ $originLng }}
]).addTo(map)
.bindPopup(
"<b>Origin</b><br>{{ $shipment->originPort->name }}"
);

var current = L.marker([
    {{ $currentLat }},
    {{ $currentLng }}
]).addTo(map)
.bindPopup(
"<b>Current Position</b><br>Shipment In Transit"
);

var destination = L.marker([
    {{ $destinationLat }},
    {{ $destinationLng }}
]).addTo(map)
.bindPopup(
"<b>Destination</b><br>{{ $shipment->destinationPort->name }}"
);

L.polyline([
    [
        {{ $originLat }},
        {{ $originLng }}
    ],
    [
        {{ $currentLat }},
        {{ $currentLng }}
    ],
    [
        {{ $destinationLat }},
        {{ $destinationLng }}
    ]
],{
    color:'blue',
    weight:5
}).addTo(map);

var group = new L.featureGroup([
    origin,
    current,
    destination
]);

map.fitBounds(group.getBounds(), {
    padding:[50,50]
});

</script>

@stop