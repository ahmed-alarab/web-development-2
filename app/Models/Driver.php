<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
    protected $fillable = [
        'plate_number', 'vehicle_type', 'status', 'license_number', 'license_expiry',
        'rating', 'pricing_model', 'verified', 'shift_start', 'shift_end', 'working_area', 'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function pricingModels()
    {
        return $this->hasMany(PricingModel::class);
    }
    public function orders(){
        return $this->hasMany(Order::class);
    }
}
