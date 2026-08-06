<?php
namespace App\Http\Controllers;
use App\Models\Bus; use App\Models\Stop;
class HomeController extends Controller
{
    public function __invoke()
    {
        $stops = Stop::where('is_active', true)->orderBy('name')->get();

        return view('home', [
            'stops' => $stops,
            'mapStops' => $stops->map(fn (Stop $stop) => $stop->only(['id', 'name', 'code', 'address', 'latitude', 'longitude']))->values(),
            'featuredStops' => Stop::where('is_active', true)->with('routes.bus')->has('routes')->take(4)->get(),
            'busCount' => Bus::where('is_active', true)->count(),
        ]);
    }
}
