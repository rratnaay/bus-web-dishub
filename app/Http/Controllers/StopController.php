<?php

namespace App\Http\Controllers;

use App\Models\Stop;

class StopController extends Controller
{
    public function show(Stop $stop)
    {
        $stop->load(['routes.bus.schedules']);

        return view('stops.show', compact('stop'));
    }
}
