<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Stop extends Model
{
    protected $fillable = ['name', 'code', 'address', 'latitude', 'longitude', 'is_active'];
    protected function casts(): array { return ['is_active' => 'boolean']; }
    public function routes(): BelongsToMany { return $this->belongsToMany(Route::class)->withPivot('sequence', 'estimated_minutes')->orderByPivot('sequence'); }
}
