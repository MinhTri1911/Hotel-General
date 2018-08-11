<?php

/**
 * File Constant.php
 *
 * Define constant to control system
 * @package Modules\DashBoard\Common
 * @author TriHNM <minhtri191195@gmail.com>
 * @date 2018-08-09
 */

namespace Modules\DashBoard\Common;

class Constant
{
    // Price type
    const PRICE_WITH_HOURSE = 0;
    const PRICE_WITH_DATE = 1;

    // Room type
    const ROOM_TYPE_ONE = 1;
    const ROOM_TYPE_TWO = 2;
    const ROOM_TYPE_BIG = 3;

    // Http status code
    const CODE_OKE = 200;
    const CODE_ERROR = 500;
    const CODE_AUTH = 403;

    // Status checkin room
    const STATUS_FREE_CHECKIN = 0;
    const STATUS_HAVE_CHECKIN = 1;
}
