<?php

namespace Modules\DashBoard\Models;

use Illuminate\Database\Eloquent\Model;

class ImageRoom extends Model
{
    protected $fillable = [
        'room_id',
        'url',
        'description',
        'image_type_id',
    ];

    /**
     * Relationship image room belongs to room
     *
     * @return void
     */
    public function room()
    {
        return $this->belongsTo(Room::class);
    }

    /**
     * Relationship image room belongs to image type
     *
     * @return void
     */
    public function imageType()
    {
        return $this->belongsTo(ImageType::class);
    }
}
