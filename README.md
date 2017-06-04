# Laravel Dusk for Sentinel

[![Build Status](https://travis-ci.org/rymanalu/dusk-for-sentinel.svg?branch=master)](https://travis-ci.org/rymanalu/dusk-for-sentinel)

This package override the routes that used by `loginAs` method in [Laravel Dusk](https://github.com/laravel/dusk) so it can be used for Laravel project who using the [Sentinel](https://github.com/cartalyst/sentinel) package for the authentication, since the default implementation of that method is using the Laravel Authentication service.

## Installation
First, install this package via the Composer package manager:
```
composer require rymanalu/dusk-for-sentinel
```

It is fine if you already install the Laravel Dusk before or only install this package.

Register the `Rymanalu\DuskForSentinel\DuskForSentinelServiceProvider` in your `AppServiceProvider`. If you already register the `Laravel\Dusk\DuskServiceProvider`, just replace it to this provider:

```php
use Rymanalu\DuskForSentinel\DuskForSentinelServiceProvider;

/**
 * Register any application services.
 *
 * @return void
 */
public function register()
{
    if ($this->app->environment('local', 'testing')) {
        $this->app->register(DuskForSentinelServiceProvider::class);
    }
}
```

You may run `php artisan dusk:install` if you haven't already publish the Dusk package or you can check out the [documentation](https://laravel.com/docs/dusk#installation) for further Dusk configuration.

## Usage

So now, you can authenticate the Sentinel User object with the `loginAs` method in your browser test script:

```php
$this->browse(function (Browser $browser) {
    $browser->loginAs(Sentinel::findById(1))
            ->visit('/home');
});
```
