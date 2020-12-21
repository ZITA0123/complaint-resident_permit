<?php

namespace App\Providers;

use app\Repositories\Eloquent\EloquentRdv;
use app\Repositories\Eloquent\EloquentUser;
use app\Repositories\Interfaces\RdvInterface;
use app\Repositories\Interfaces\UserInterface;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    public $bindings=[

    ];
    public $singletons=[
       UserInterface::class => EloquentUser::class,
       RdvInterface::class=> EloquentRdv::class,

    ];

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
