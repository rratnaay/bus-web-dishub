<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Schedule extends Model
{
    protected $fillable = ['bus_id', 'day_type', 'start_time', 'end_time', 'headway_minutes'];
    public function bus(): BelongsTo { return $this->belongsTo(Bus::class); }
}
