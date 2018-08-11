<?php

Route::group([
    'middleware' => ['web','auth'],
    'prefix' => 'admin/room',
    'namespace' => 'Modules\DashBoard\Http\Controllers',
    'as' => 'admin.room.',
], function () {
    Route::resource('/', 'RoomController', [
        'only' => ['index', 'create', 'store'],
    ]);

    Route::post('/upload-images', 'RoomController@uploadImage')->name('upload.image');
    Route::post('/remove-images', 'RoomController@removeImage')->name('remove.image');
});
