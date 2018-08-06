<?php

/**
 * File Service porvider
 * Hanlde include all modules to project
 * @author TriHNM <minhtri191195@gmail.com>
 * @package App\Modules
 * @date 2018-08-06
 */

namespace App\Modules;

use File;
use \Illuminate\Support\ServiceProvider as Service;

class ServiceProvider extends Service
{
    protected static $repositories = [
        'room' => [
            'interface' => \App\Modules\BaseFeature\Eloquents\Rooms\RoomInterface::class,
            'eloquent' => \App\Modules\BaseFeature\Eloquents\Rooms\RoomEloquent::class,
        ],
    ];

    public function boot()
    {
        $listModule = array_map('basename', File::directories(__DIR__));

        foreach ($listModule as $module) {
            if (file_exists(__DIR__ . '/' . $module . '/routers/index.php')) {
                include __DIR__ . '/'. $module . '/routers/index.php';
            }

            if (is_dir(__DIR__ . '/' . $module . '/Views')) {
                $this->loadViewsFrom(__DIR__ . '/' . $module . '/Views', $module);
            }
        }
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        foreach (static::$repositories as $repository) {
            $this->app->singleton(
                $repository['interface'],
                $repository['eloquent']
            );
        }
    }
}
