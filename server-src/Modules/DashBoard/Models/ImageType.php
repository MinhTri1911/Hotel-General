<?php

namespace Modules\DashBoard\Models;

use Illuminate\Database\Eloquent\Model;

class ImageType extends Model
{
    protected $fillable = [
        'type',
        'position',
        'option',
        'width',
        'height',
        'margin',
        'padding',
    ];

    /**
     * Relationship image type has many image room
     *
     * @return void
     */
    public function images()
    {
        return $this->hasMany(ImageRoom::class);
    }
}
