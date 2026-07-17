<?php

namespace App\Http\Controllers;

use App\Services\CountryService;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CountryController extends Controller
{
    protected CountryService $countryService;

    public function __construct(CountryService $countryService)
    {
        $this->countryService = $countryService;
    }

    /**
     * Daftar semua negara
     */
    public function index(): View
    {
        $countries = $this->countryService->getAllCountries();

        return view('countries.index', [

            'countries' => $countries

        ]);
    }

    /**
     * Detail negara
     */
    public function show(string $countryCode): View
    {
        $country = $this->countryService
            ->getCountry($countryCode);

        abort_if(!$country, 404);

        return view('countries.show', [

            'country' => $country

        ]);
    }

    /**
     * Pencarian negara
     */
    public function search(Request $request)
    {
        $keyword = $request->keyword;

        $countries = $this->countryService
            ->search($keyword);

        return response()->json($countries);
    }
}