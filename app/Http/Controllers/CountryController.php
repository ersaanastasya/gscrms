<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;

class CountryController extends Controller
{
   public function index(Request $request)
{
    $query = Country::query();

    if ($request->filled('search')) {
        $query->where('name', 'like', '%' . $request->search . '%')
              ->orWhere('code', 'like', '%' . $request->search . '%')
              ->orWhere('capital', 'like', '%' . $request->search . '%');
    }

    if ($request->filled('region')) {
        $query->where('region', $request->region);
    }

    $countries = $query
        ->orderBy('name')
        ->paginate(20)
        ->withQueryString();

    $regions = Country::select('region')
        ->whereNotNull('region')
        ->distinct()
        ->orderBy('region')
        ->pluck('region');

    return view('countries.index', compact(
        'countries',
        'regions'
    ));
}
    public function show(Country $country)
    {
        return view('countries.show', compact('country'));
    }
    public function create()
    {
        return view('countries.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'country_name' => 'required|max:100',
            'country_code' => 'required|max:10|unique:countries,country_code',
        ]);

        Country::create($request->all());

        return redirect()
            ->route('countries.index')
            ->with('success', 'Country berhasil ditambahkan.');
    }

    public function edit(Country $country)
    {
        return view('countries.edit', compact('country'));
    }

    public function update(Request $request, Country $country)
    {
        $request->validate([
            'country_name' => 'required|max:100',
            'country_code' => 'required|max:10|unique:countries,country_code,' . $country->id,
        ]);

        $country->update($request->all());

        return redirect()
            ->route('countries.index')
            ->with('success', 'Country berhasil diperbarui.');
    }

    public function destroy(Country $country)
    {
        $country->delete();

        return redirect()
            ->route('countries.index')
            ->with('success', 'Country berhasil dihapus.');
    }
}