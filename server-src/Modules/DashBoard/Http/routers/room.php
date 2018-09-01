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
});

Route::group([
    'middleware' => ['web','auth'],
    'prefix' => 'admin/files',
    'namespace' => 'Modules\DashBoard\Http\Controllers',
    'as' => 'admin.file.',
], function () {
    Route::post('/upload-images', 'UploadFileController@uploadImage')->name('upload.image');
    Route::post('/remove-images', 'UploadFileController@removeImage')->name('remove.image');
});
