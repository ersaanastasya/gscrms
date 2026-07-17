<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class DashboardController extends Controller
{
    /**
     * Display the dashboard.
     */
    public function index(): View
    {
        return view('dashboard.index', [
            'pageTitle' => 'Dashboard',
            'pageDescription' => 'Global Supply Chain Risk Monitoring System',

            // Statistik Global (sementara kosong)
            'totalCountries' => 0,
            'highRiskCountries' => 0,
            'averageRiskScore' => 0,
            'todayNews' => 0,

            // Data untuk widget
            'selectedCountry' => null,
            'weather' => null,
            'currency' => null,
            'statistics' => null,
            'riskScore' => null,
            'ports' => [],
            'news' => [],
        ]);
    }
}