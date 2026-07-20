<?php

namespace App\Http\Controllers;

use App\Models\Favorite;
use App\Models\Country;
use Illuminate\Http\Request;

class FavoriteController extends Controller
{
    public function index()
    {
        $favorites = Favorite::with('country')
            ->where('user_id', auth()->id())
            ->paginate(10);

        return view('favorites.index', compact('favorites'));
    }

    public function store(Country $country)
    {
        Favorite::firstOrCreate([
            'user_id' => auth()->id(),
            'country_id' => $country->id,
        ]);

        return back()->with('success', 'Country added to favorites.');
    }

    public function destroy(Favorite $favorite)
    {
        if ($favorite->user_id == auth()->id()) {
            $favorite->delete();
        }

        return back()->with('success', 'Favorite removed.');
    }
}