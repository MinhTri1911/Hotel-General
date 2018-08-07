<?php

/**
 * File Manager Room Controller
 * Hanlde request
 * @author TriHNM <minhtri191195@gmail.com>
 * @package App\Modules\BaseFeature\Http\Controllers
 * @date 2018-08-06
 */

namespace App\Modules\BaseFeature\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Modules\BaseFeature\Models\Room;
use App\Modules\BaseFeature\Eloquents\Rooms\RoomInterface;

class ManagerRoomController extends Controller
{
    protected $room;

    public function __construct(RoomInterface $room)
    {
        $this->room = $room;
    }

    public function index()
    {
        dd($this->room->queryBuilder()->where('id', 1)->get()->first(),
            $this->room->where('id', 1)->get()->first()->type);
    }
}
