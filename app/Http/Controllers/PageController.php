<?php

namespace App\Http\Controllers;

use App\Models\Bus;
use App\Models\Stop;

class PageController extends Controller
{
    public function routes()
    {
        $stops = Stop::query()->where('is_active', true)->orderBy('name')->get();

        return view('pages.routes', [
            'buses' => Bus::query()
                ->where('is_active', true)
                ->with(['routes.stops'])
                ->orderBy('corridor_number')
                ->get(),
            'stops' => $stops,
            'mapStops' => $stops->map(fn (Stop $stop) => $stop->only(['name', 'code', 'address', 'latitude', 'longitude']))->values(),
        ]);
    }

    public function stops()
    {
        return view('pages.stops', [
            'stops' => Stop::query()->where('is_active', true)->orderBy('name')->paginate(18),
        ]);
    }

    public function about()
    {
        return view('pages.about');
    }
}
