<?php
namespace App\Http\Controllers;
use App\Models\Bus; use App\Models\Stop; use Illuminate\Http\Request;
class SearchController extends Controller {
 public function __invoke(Request $request) { $data=$request->validate(['origin'=>['nullable','exists:stops,id'],'destination'=>['nullable','exists:stops,id'],'q'=>['nullable','string','max:100']]); $buses=Bus::query()->where('is_active',true)->with(['routes.stops','schedules']); if($data['q']??false) $buses->where(fn($q)=>$q->where('name','like',"%{$data['q']}%")->orWhere('corridor_number','like',"%{$data['q']}%")); foreach(['origin','destination'] as $field) if($data[$field]??false) $buses->whereHas('routes.stops',fn($q)=>$q->where('stops.id',$data[$field]));
    if (! $request->expectsJson()) return view('search.results',['buses'=>$buses->paginate(9)->withQueryString(),'origin'=>isset($data['origin'])?Stop::find($data['origin']):null,'destination'=>isset($data['destination'])?Stop::find($data['destination']):null]);

    if (! isset($data['origin'], $data['destination'])) return response()->json(['message' => 'Pilih lokasi asal dan tujuan terlebih dahulu.'], 422);

    $bus = $buses->get()->first(function (Bus $bus) use ($data) {
        return $bus->routes->contains(function ($route) use ($data) {
            $stopIds = $route->stops->pluck('id');
            return $stopIds->contains($data['origin']) && $stopIds->contains($data['destination']);
        });
    });

    if (! $bus) return response()->json(['message' => 'Belum ada satu koridor yang menghubungkan kedua halte tersebut.'], 404);

    $route = $bus->routes->first(fn ($route) => $route->stops->pluck('id')->contains($data['origin']) && $route->stops->pluck('id')->contains($data['destination']));
    $origin = Stop::findOrFail($data['origin']);
    $destination = Stop::findOrFail($data['destination']);

    return response()->json(['route' => [
        'bus_name' => $bus->name,
        'corridor' => $bus->corridor_number,
        'color' => $bus->color,
        'minutes' => $bus->estimated_minutes,
        'origin' => $origin->only(['id', 'name', 'latitude', 'longitude']),
        'destination' => $destination->only(['id', 'name', 'latitude', 'longitude']),
        'stops' => $route->stops->map(fn (Stop $stop) => $stop->only(['id', 'name', 'code', 'address', 'latitude', 'longitude']))->values(),
    ]]); }
}
