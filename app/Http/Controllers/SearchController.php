<?php
namespace App\Http\Controllers;
use App\Models\Bus; use App\Models\Stop; use Illuminate\Http\Request;
class SearchController extends Controller {
 public function __invoke(Request $request) { $data=$request->validate(['origin'=>['nullable','exists:stops,id'],'destination'=>['nullable','exists:stops,id'],'q'=>['nullable','string','max:100']]); $buses=Bus::query()->where('is_active',true)->with(['routes.stops','schedules']); if($data['q']??false) $buses->where(fn($q)=>$q->where('name','like',"%{$data['q']}%")->orWhere('corridor_number','like',"%{$data['q']}%")); foreach(['origin','destination'] as $field) if($data[$field]??false) $buses->whereHas('routes.stops',fn($q)=>$q->where('stops.id',$data[$field])); return view('search.results',['buses'=>$buses->paginate(9)->withQueryString(),'origin'=>isset($data['origin'])?Stop::find($data['origin']):null,'destination'=>isset($data['destination'])?Stop::find($data['destination']):null]); }
}
