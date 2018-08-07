<?php

namespace App\Modules\BaseFeature\Models;

use Illuminate\Database\Eloquent\Model;

class RoomType extends Model
{
    protected $fillable = [
        'type',
        'name_default',
        'name',
        'people',
        'bed',
    ];

    /**
     * Relationship room type has many room
     *
     * @param Type $var
     * @return void
     */
    public function rooms()
    {
        return $this->hasMany(Room::class);
    }
}
