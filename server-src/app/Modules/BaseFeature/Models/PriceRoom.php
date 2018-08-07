<?php

namespace App\Modules\BaseFeature\Models;

use Illuminate\Database\Eloquent\Model;

class PriceRoom extends Model
{
    protected $fillable = [
        'amount',
        'discount',
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
