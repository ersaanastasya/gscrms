@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<h1>Dashboard GSCRMS</h1>
@stop

@section('css')

<link rel="stylesheet"
href="https://unpkg.com/leaflet/dist/leaflet.css"/>

<style>

#worldMap{
    height:600px;
    border-radius:10px;
}

</style>

@stop

@section('content')

<div class="row">

    <div class="col-lg-3 col-6">
        <div class="small-box bg-info">
            <div class="inner">
                <h3>{{ $countries }}</h3>
                <p>Countries</p>
            </div>
            <div class="icon">
                <i class="fas fa-globe"></i>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-6">
        <div class="small-box bg-success">
            <div class="inner">
                <h3>{{ $ports }}</h3>
                <p>Ports</p>
            </div>
            <div class="icon">
                <i class="fas fa-anchor"></i>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-6">
        <div class="small-box bg-warning">
            <div class="inner">
              <h3>{{ $shipmentCount }}</h3>
                <p>Shipments</p>
            </div>
            <div class="icon">
                <i class="fas fa-ship"></i>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-6">
        <div class="small-box bg-danger">
            <div class="inner">
                <h3>{{ $highRisk }}</h3>
                <p>High Risk</p>
            </div>
            <div class="icon">
                <i class="fas fa-exclamation-triangle"></i>
            </div>
        </div>
    </div>

</div>

<div class="card">

    <div class="card-header">
        <h3 class="card-title">
            <i class="fas fa-cloud-sun"></i>
            Global Weather
        </h3>
    </div>

    <div class="card-body">

        <div class="row">

            @forelse($weatherData as $weather)

                <div class="col-md-4">

                    <div class="border rounded p-3 mb-3">

                        <h5>
                            {{ $weather->country->name }}
                        </h5>

                        <p class="mb-1">
                            <strong>City :</strong>
                            {{ $weather->city }}
                        </p>

                        <p class="mb-1">
                            🌡 {{ $weather->temperature }} °C
                        </p>

                        <p class="mb-1">
                            💧 {{ $weather->humidity }} %
                        </p>

                        <p class="mb-1">
                            🌬 {{ $weather->wind_speed }} km/h
                        </p>

                        <span class="badge badge-info">

                            {{ $weather->weather_condition }}

                        </span>

                    </div>

                </div>

            @empty

                <div class="col-12">

                    <div class="alert alert-warning">

                        Weather data not available.

                    </div>

                </div>

            @endforelse

        </div>

    </div>
</div>
</div>


    
    <div class="card">

     <div class="card-header">
        <h3 class="card-title">
            World Shipment Map
        </h3>
</div>
    <div class="card-body">
         <div id="worldMap"></div>

    </div>

</div>


<div class="row">

    <div class="col-md-6">

        <div class="card">

            <div class="card-header">
                <h3 class="card-title">
                    Risk Level Distribution
                </h3>
            </div>

            <div class="card-body">

                <canvas id="riskChart"></canvas>

            </div>

        </div>

    </div>

    <div class="col-md-6">

        <div class="card">

            <div class="card-header">
                <h3 class="card-title">
                    Shipment Status
                </h3>
            </div>

            <div class="card-body">

                <canvas id="statusChart"></canvas>

            </div>

        </div>

    </div>

</div>
<div class="row">

    <div class="col-md-6">
            <div class="card">

<div class="card-header">

    <h3 class="card-title">
        Recent Shipments
    </h3>

    <div class="card-tools">

        <a href="{{ route('monitoring.index') }}"
           class="btn btn-sm btn-primary">

            View All

        </a>

    </div>

</div>

            <div class="card-body">

                <table class="table table-bordered">

                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Status</th>
                        </tr>
                    </thead>

                    <tbody>

                    @foreach($recentShipments as $shipment)

                        <tr>

                            <td>{{ $shipment->id }}</td>

                            <td>

    @if($shipment->status == 'Delivered')

        <span class="badge badge-success">
            Delivered
        </span>

    @elseif($shipment->status == 'In Transit')

        <span class="badge badge-warning">
            In Transit
        </span>

    @elseif($shipment->status == 'Delayed')

        <span class="badge badge-danger">
            Delayed
        </span>

    @else

        <span class="badge badge-secondary">
            {{ $shipment->status }}
        </span>

    @endif

</td>

                        </tr>

                    @endforeach

                    </tbody>

                </table>

            </div>

        </div>

    </div>

    <div class="col-md-6">

        <div class="card">

           <div class="card-header">

            <h3 class="card-title">
                Latest Articles
            </h3>

            <div class="card-tools">

                <a href="{{ route('articles.index') }}"
                class="btn btn-sm btn-success">

                    View All

                </a>

            </div>

        </div>

            <div class="card-body">

                <ul class="list-group">

                    @foreach($articles as $article)

                        <li class="list-group-item">

                            <strong>{{ $article->title }}</strong>

                            <br>

                            <small class="text-muted">

                                {{ $article->created_at->format('d M Y') }}

                            </small>

                        </li>

                    @endforeach

                </ul>

            </div>

        </div>

    </div>

</div>

@stop


@section('js')

<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>

var map = L.map('worldMap').setView([20,0],2);

L.tileLayer(
'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png',
{
    maxZoom:18,
    attribution:'© OpenStreetMap'
}).addTo(map);

var containerIcon = L.icon({
    iconUrl: 'https://cdn-icons-png.flaticon.com/512/679/679922.png',
    iconSize: [30, 30],
    iconAnchor: [15, 15]
});
var markers = [];

@foreach($shipments as $shipment)

@if(
    $shipment->originPort &&
    $shipment->destinationPort &&
    $shipment->originPort->latitude &&
    $shipment->originPort->longitude &&
    $shipment->destinationPort->latitude &&
    $shipment->destinationPort->longitude
)

@for($i = 1; $i <= 10; $i++)

@php
$progress = mt_rand(5,95)/100;


$offsetLat = mt_rand(-40,40)/100;
$offsetLng = mt_rand(-40,40)/100;

$currentLat =
$shipment->originPort->latitude +
(($shipment->destinationPort->latitude -
$shipment->originPort->latitude)
*
$progress)
+
$offsetLat;

$currentLng =
$shipment->originPort->longitude +
(($shipment->destinationPort->longitude -
$shipment->originPort->longitude)
*
$progress)
+
$offsetLng;
@endphp

@php
$riskColor = '#28a745'; // Hijau (Low)

if(optional($shipment->riskScore)->risk_level == 'Medium'){
    $riskColor = '#ffc107';
}

if(optional($shipment->riskScore)->risk_level == 'High'){
    $riskColor = '#dc3545';
}
@endphp

L.polyline([
    [
        {{ $shipment->originPort->latitude }},
        {{ $shipment->originPort->longitude }}
    ],
    [
        {{ $shipment->destinationPort->latitude }},
        {{ $shipment->destinationPort->longitude }}
    ]
],{
    color:'{{ $riskColor }}',
    weight:3,
    opacity:0.8
}).addTo(map);

var marker = L.marker(
[
{{ $currentLat }},
{{ $currentLng }}
],
{
    icon: containerIcon
}).addTo(map);
markers.push(marker);

@endfor
@endif
@endforeach

if(markers.length > 0){

    var group = new L.featureGroup(markers);

    map.fitBounds(group.getBounds(),{
        padding:[30,30]
    });

}

</script>

            <script>

            new Chart(document.getElementById('riskChart'),{

            type:'doughnut',

            data:{
            labels:['High','Medium','Low'],
            datasets:[{
            data:[
            {{ $riskChart['High'] }},
            {{ $riskChart['Medium'] }},
            {{ $riskChart['Low'] }}
            ]
            }]
            }

            });

            new Chart(document.getElementById('statusChart'),{

            type:'bar',

            data:{
            labels:{!! json_encode($statusChart->keys()) !!},
            datasets:[{
            label:'Shipments',
            data:{!! json_encode($statusChart->values()) !!}
            }]
            }

            });

            </script>

            @stop