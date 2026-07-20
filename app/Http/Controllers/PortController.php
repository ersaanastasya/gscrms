<?php

namespace App\Http\Controllers;

use App\Models\Port;
use App\Models\Country;
use Illuminate\Http\Request;

class PortController extends Controller
{
    public function index(Request $request)
    {
        $query = Port::with('country');

        if ($request->filled('search')) {
            $query->where(function ($q) use ($request) {
                $q->where('name', 'like', '%' . $request->search . '%')
                  ->orWhere('code', 'like', '%' . $request->search . '%')
                  ->orWhere('city', 'like', '%' . $request->search . '%');
            });
        }

        if ($request->filled('country')) {
            $query->where('country_id', $request->country);
        }

        $ports = $query
            ->orderBy('name')
            ->paginate(10)
            ->withQueryString();

        $countries = Country::orderBy('name')->get();

        return view('ports.index', compact(
            'ports',
            'countries'
        ));
    }
}