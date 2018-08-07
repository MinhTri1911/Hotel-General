<?php

namespace App\Modules\BaseFeature\Models;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $fillable = [
        'room_type_id',
        'price_room_id',
        'room_name_default',
        'room_name',
        'level',
    ];

    /**
     * Relationship room belongs to one room type
     *
     * @param Type $var
     * @return void
     */
    public function type()
    {
        return $this->belongsTo(RoomType::class, 'room_type_id');
    }

    /**
     * Relationship room has one price
     *
     * @return void
     */
    public function price()
    {
        return $this->belongsTo(PriceRoom::class);
    }

    /**
     * Relationship room has many images
     *
     * @return void
     */
    public function images()
    {
        return $this->hasMany(ImageRoom::class);
    }
}
