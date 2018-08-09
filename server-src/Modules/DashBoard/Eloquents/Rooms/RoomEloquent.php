<?php

/**
 * File Manager Room Eloquent
 * Hanlde ORM
 * @author TriHNM <minhtri191195@gmail.com>
 * @package App\Modules\BaseFeature\Eloquents\Rooms
 * @date 2018-08-06
 */

namespace App\Modules\DashBoard\Eloquents\Rooms;

use App\BaseEloquent\BaseEloquent;
use App\Modules\DashBoard\Models\Room;

class RoomEloquent extends BaseEloquent implements RoomInterface
{
    public function model()
    {
        return Room::class;
    }

    public function tableName()
    {
        return 'rooms';
    }
}
