<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Bus;
use App\Models\Route;
use App\Models\Schedule;
use App\Models\Stop;

class AdminDashboardController extends Controller
{
    public function __invoke()
    {
        return view('admin.dashboard', [
            'statistics' => [
                ['label' => 'Total Bus', 'value' => Bus::count(), 'icon' => '🚌', 'color' => 'blue'],
                ['label' => 'Total Halte', 'value' => Stop::count(), 'icon' => '⌖', 'color' => 'emerald'],
                ['label' => 'Total Rute', 'value' => Route::count(), 'icon' => '↝', 'color' => 'violet'],
                ['label' => 'Total Jadwal', 'value' => Schedule::count(), 'icon' => '◷', 'color' => 'amber'],
            ],
            'recentBuses' => Bus::latest()->take(5)->get(),
        ]);
    }
}
