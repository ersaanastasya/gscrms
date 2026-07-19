<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\Port;
use App\Models\Shipment;
use App\Models\RiskScore;
use App\Models\Article;

class DashboardController extends Controller
{
    public function index()
    {
        $countries = Country::count();
        $ports = Port::count();
        $shipments = Shipment::count();

        $highRisk = RiskScore::where('risk_level', 'High')->count();

        $recentShipments = Shipment::latest()->take(5)->get();

        $articles = Article::latest()->take(5)->get();

        return view('dashboard.index', compact(
            'countries',
            'ports',
            'shipments',
            'highRisk',
            'recentShipments',
            'articles'
        ));
    }
}