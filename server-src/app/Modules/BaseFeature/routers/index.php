<?php

/**
 * File route index.php
 * Define request with controller
 * @author TriHNM <minhtri191195@gmail.com>
 * @package App\Modules\BaseFeature\route
 * @date 2018-08-06
 */

$namespace = 'App\Modules\BaseFeature\Http\Controllers';

Route::group(['module' => 'BaseFeature', 'namespace' => $namespace], function() {
    Route::get('demo', [
        'as' => 'index',
        'uses' => 'ManagerRoomController@index'
    ]);

    Route::get('login', 'LoginController@getLogin')->name('login.get');

    Route::post('login', 'LoginController@postLogin')->name('login.post');
});
