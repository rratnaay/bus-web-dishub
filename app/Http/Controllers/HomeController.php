<?php
namespace App\Http\Controllers;
use App\Models\Bus; use App\Models\Stop;
class HomeController extends Controller { public function __invoke() { return view('home', ['stops' => Stop::where('is_active', true)->orderBy('name')->get(), 'busCount' => Bus::where('is_active', true)->count()]); } }
