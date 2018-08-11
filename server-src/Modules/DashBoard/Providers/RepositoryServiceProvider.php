<?php

namespace Modules\DashBoard\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $boot = [
            'room' => [
                'interface' => \Modules\DashBoard\Eloquents\Rooms\RoomInterface::class,
                'repository' => \Modules\DashBoard\Eloquents\Rooms\RoomEloquent::class,
            ],
        ];

        foreach ($boot as $value) {
            $this->app->singleton($value['interface'], $value['repository']);
        }

    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [];
    }
}
