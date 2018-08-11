<?php

/**
 * File RoomBusiness
 * Handle business of room
 *
 * @author TriHNM <minhtri191195@gmail.com>
 * @package Modules\DashBoard\Business
 * @date 2018-08-11
 */

namespace Modules\DashBoard\Business;

use Modules\DashBoard\Eloquents\Rooms\RoomInterface;

class RoomBusiness
{
    private $_roomEloquent;

    public function __construct(RoomInterface $room)
    {
        $this->_roomEloquent = $room;
    }

    public function initList()
    {

    }

    public function initCreate()
    {
        # code...
    }
}
