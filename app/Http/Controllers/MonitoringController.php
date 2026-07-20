<?php

namespace App\Http\Controllers;

use App\Models\Shipment;
use Illuminate\Http\Request;

class MonitoringController extends Controller
{
    public function index()
{
    $shipments = Shipment::with([
        'originPort.country',
        'destinationPort.country',
        'riskScore'
    ])
    ->latest()
    ->paginate(10);

    return view('monitoring.index', compact('shipments'));
}

   public function show(Shipment $shipment)
{
    $shipment->load([
        'originPort.country',
        'destinationPort.country',
        'riskScore'
    ]);
    $originLat =
$shipment->originPort->latitude;

$originLng =
$shipment->originPort->longitude;

$destinationLat =
$shipment->destinationPort->latitude;

$destinationLng =
$shipment->destinationPort->longitude;

$progress = 0.65;

$currentLat =
$originLat +
(($destinationLat-$originLat)*$progress);

$currentLng =
$originLng +
(($destinationLng-$originLng)*$progress);

return view(
'monitoring.show',
compact(
'shipment',
'originLat',
'originLng',
'destinationLat',
'destinationLng',
'currentLat',
'currentLng'
));

}
}