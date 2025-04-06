<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pricing_model extends Model
{
    protected $fillable = ['base_fare', 'per_km_rate', 'size_multiplier', 'driver_id'];

    public function driver()
    {
        return $this->belongsTo(Driver::class);
    }
}
