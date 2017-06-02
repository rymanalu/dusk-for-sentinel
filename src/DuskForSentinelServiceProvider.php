<?php

namespace Rymanalu\DuskForSentinel;

use Illuminate\Support\Facades\Route;
use Laravel\Dusk\DuskServiceProvider;
use Illuminate\Support\ServiceProvider;

class DuskForSentinelServiceProvider extends DuskServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        Route::get('/_dusk/login/{userId}', [
            'middleware' => 'web',
            'uses' => 'Rymanalu\DuskForSentinel\Http\Controllers\Dusk\UserController@login',
        ]);

        Route::get('/_dusk/logout', [
            'middleware' => 'web',
            'uses' => 'Rymanalu\DuskForSentinel\Http\Controllers\Dusk\UserController@logout',
        ]);

        Route::get('/_dusk/user', [
            'middleware' => 'web',
            'uses' => 'Rymanalu\DuskForSentinel\Http\Controllers\Dusk\UserController@user',
        ]);
    }
}
