<?php

namespace Modules\DashBoard\Models;

use Illuminate\Database\Eloquent\Model;

class PriceRoom extends Model
{
    protected $fillable = [
        'amount',
        'discount',
        'price_from',
        'price_type',
    ];

    /**
     * Relationship price has many rooms
     *
     * @return void
     */
    public function rooms()
    {
        return $this->hasMany(Room::class);
    }
}
