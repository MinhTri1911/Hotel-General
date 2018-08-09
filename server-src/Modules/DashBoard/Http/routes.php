<?php

Route::group([
    'middleware' => ['web','auth'],
    'prefix' => 'admin/dashboard',
    'namespace' => 'Modules\DashBoard\Http\Controllers'
], function() {
    Route::get('/', 'DashBoardController@index');
});

// Require if want to split file route to sub multiple file

foreach (File::allFiles(__DIR__ . '/routers') as $partial)
{
    require $partial->getPathname();
}
