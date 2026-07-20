<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\Port;
use App\Models\Shipment;
use App\Models\RiskScore;
use App\Models\Article;
use App\Models\WeatherCache;

class DashboardController extends Controller
{
    public function index()
    {
        $countries = Country::count();
        $ports = Port::count();
        $shipmentCount = Shipment::count();

$shipments = Shipment::with([
    'originPort',
    'destinationPort'
])->get();

        $highRisk = RiskScore::where('risk_level', 'High')->count();

        $recentShipments = Shipment::latest()->take(5)->get();

        $articles = Article::latest()->take(5)->get();

        $weatherData = WeatherCache::with('country')
    ->latest('cached_at')
    ->take(5)
    ->get();

      $riskChart = [
    'High' => RiskScore::where('risk_level', 'High')->count(),
    'Medium' => RiskScore::where('risk_level', 'Medium')->count(),
    'Low' => RiskScore::where('risk_level', 'Low')->count(),
];

$statusChart = Shipment::selectRaw('status, COUNT(*) as total')
    ->groupBy('status')
    ->pluck('total', 'status');

       return view('dashboard.index', compact(
    'countries',
    'ports',
    'shipmentCount',
    'shipments',
    'highRisk',
    'recentShipments',
    'articles',
    'weatherData',
    'riskChart',
    'statusChart'
));
    }
}