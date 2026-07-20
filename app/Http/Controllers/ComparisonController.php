<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;
use App\Models\Shipment;

class ComparisonController extends Controller
{
    public function index()
    {
        $countries = Country::orderBy('name')->get();

        return view('comparison.index', compact('countries'));
    }

    public function compare(Request $request)
{
    $request->validate([
        'country1' => 'required|exists:countries,id',
        'country2' => 'required|exists:countries,id',
    ]);

    $countries = Country::orderBy('name')->get();

    $country1 = Country::findOrFail($request->country1);
    $country2 = Country::findOrFail($request->country2);

    $shipment1 = Shipment::with([
        'originPort.country',
        'destinationPort.country',
        'riskScore'
    ])
    ->whereHas('originPort', function ($q) use ($country1) {
        $q->where('country_id', $country1->id);
    })
    ->first();

    $shipment2 = Shipment::with([
        'originPort.country',
        'destinationPort.country',
        'riskScore'
    ])
    ->whereHas('originPort', function ($q) use ($country2) {
        $q->where('country_id', $country2->id);
    })
    ->first();

    return view('comparison.index', compact(
        'countries',
        'country1',
        'country2',
        'shipment1',
        'shipment2'
    ));
}
}