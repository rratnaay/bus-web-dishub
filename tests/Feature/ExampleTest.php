<?php

namespace Tests\Feature;

use App\Models\Bus;
use App\Models\Route as BusRoute;
use App\Models\Stop;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic test example.
     */
    public function test_the_application_returns_a_successful_response(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_navigation_pages_are_available(): void
    {
        $this->get('/rute')->assertOk();
        $this->get('/halte')->assertOk();
        $this->get('/tentang')->assertOk();
    }

    public function test_route_search_returns_json_without_a_page_reload(): void
    {
        $origin = Stop::create(['name' => 'Halte Asal', 'code' => 'ASL', 'latitude' => -7.30, 'longitude' => 112.73, 'is_active' => true]);
        $destination = Stop::create(['name' => 'Halte Tujuan', 'code' => 'TJN', 'latitude' => -7.28, 'longitude' => 112.75, 'is_active' => true]);
        $bus = Bus::create(['name' => 'Bus Uji', 'code' => 'TEST-1', 'corridor_number' => 'T1', 'color' => '#2563eb', 'estimated_minutes' => 20, 'is_active' => true]);
        $route = BusRoute::create(['bus_id' => $bus->id, 'name' => 'Asal ke Tujuan', 'direction' => 'Pergi']);
        $route->stops()->attach([$origin->id => ['sequence' => 1], $destination->id => ['sequence' => 2]]);

        $this->getJson(route('search', ['origin' => $origin->id, 'destination' => $destination->id]))
            ->assertOk()
            ->assertJsonPath('route.bus_name', 'Bus Uji')
            ->assertJsonPath('route.origin.name', 'Halte Asal')
            ->assertJsonPath('route.destination.name', 'Halte Tujuan');
    }
}
