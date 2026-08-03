<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Bus extends Model
{
    protected $fillable = ['name', 'code', 'corridor_number', 'color', 'description', 'estimated_minutes', 'is_active'];
    protected function casts(): array { return ['is_active' => 'boolean']; }
    public function routes(): HasMany { return $this->hasMany(Route::class); }
    public function schedules(): HasMany { return $this->hasMany(Schedule::class); }
}
