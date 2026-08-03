<?php
namespace App\Http\Controllers;
use App\Models\Bus;
class BusController extends Controller { public function show(Bus $bus) { $bus->load(['routes.stops','schedules']); return view('buses.show',compact('bus')); } }
