<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = ['payment_method', 'order_id'];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
