<?php

namespace Database\Seeders;

use App\Models\Bus;
use App\Models\Route;
use App\Models\Schedule;
use App\Models\Stop;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(['email' => 'admin@dishub.test'], [
            'name' => 'Admin Dishub', 'password' => Hash::make('password'), 'is_admin' => true,
        ]);

        $stops = collect([
            ['Terminal Purabaya', 'PUR', -7.3605, 112.7232], ['Waru', 'WRU', -7.3490, 112.7295],
            ['Jemursari', 'JMR', -7.3228, 112.7426], ['Wonokromo', 'WNR', -7.3004, 112.7381],
            ['Darmo', 'DRM', -7.2859, 112.7378], ['Tunjungan', 'TNJ', -7.2575, 112.7521],
            ['Joyoboyo', 'JYB', -7.2944, 112.7339], ['Kenjeran', 'KNJ', -7.2255, 112.7817],
            ['Unesa', 'UNE', -7.2807, 112.6225], ['ITS', 'ITS', -7.2819, 112.7941],
        ])->mapWithKeys(function (array $stop) {
            $model = Stop::updateOrCreate(['code' => $stop[1]], [
                'name' => $stop[0], 'address' => 'Surabaya', 'latitude' => $stop[2], 'longitude' => $stop[3], 'is_active' => true,
            ]);
            return [$stop[1] => $model];
        });

        $lines = [
            ['B1', 'B1', '#16a34a', 'Terminal Purabaya ↔ Tunjungan', ['PUR', 'WRU', 'JMR', 'WNR', 'DRM', 'TNJ'], 42],
            ['B2', 'B2', '#2563eb', 'Joyoboyo ↔ Kenjeran', ['JYB', 'WNR', 'DRM', 'TNJ', 'KNJ'], 38],
            ['B3', 'B3', '#f97316', 'Unesa ↔ ITS', ['UNE', 'DRM', 'WNR', 'JMR', 'ITS'], 55],
            ['B5', 'B5', '#a855f7', 'Waru ↔ Kenjeran', ['WRU', 'JMR', 'WNR', 'TNJ', 'KNJ'], 48],
        ];

        foreach ($lines as [$code, $number, $color, $corridor, $stopCodes, $minutes]) {
            $bus = Bus::updateOrCreate(['code' => $code], [
                'name' => "Bus {$number}", 'corridor_number' => $number, 'color' => $color,
                'description' => "Layanan {$corridor}.", 'estimated_minutes' => $minutes, 'is_active' => true,
            ]);
            $route = Route::updateOrCreate(['bus_id' => $bus->id, 'direction' => 'Pergi'], [
                'name' => $corridor, 'description' => "Rute {$number} {$corridor}",
            ]);
            $route->stops()->sync(collect($stopCodes)->mapWithKeys(
                fn ($stopCode, $index) => [$stops[$stopCode]->id => ['sequence' => $index + 1, 'estimated_minutes' => $index * 9]]
            ));
            Schedule::updateOrCreate(['bus_id' => $bus->id, 'day_type' => 'Setiap Hari'], [
                'start_time' => '05:00', 'end_time' => '22:00', 'headway_minutes' => 15,
            ]);
        }
    }
}
