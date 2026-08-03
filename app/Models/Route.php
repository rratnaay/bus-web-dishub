<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Route extends Model
{
    protected $fillable = ['bus_id', 'name', 'direction', 'description', 'path_coordinates'];
    protected function casts(): array { return ['path_coordinates' => 'array']; }
    public function bus(): BelongsTo { return $this->belongsTo(Bus::class); }
    public function stops(): BelongsToMany { return $this->belongsToMany(Stop::class)->withPivot('sequence', 'estimated_minutes')->orderByPivot('sequence'); }
}
