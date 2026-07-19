@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<h1>Dashboard GSCRMS</h1>
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
                <h3>{{ $shipments }}</h3>
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

<div class="row">

    <div class="col-md-6">

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

                <a href="{{ route('#') }}"
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