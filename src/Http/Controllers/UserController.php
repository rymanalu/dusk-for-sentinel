<?php

namespace Rymanalu\DuskForSentinel\Http\Controllers;

use Exception;
use Cartalyst\Sentinel\Sentinel;
use Illuminate\Contracts\Config\Repository as Config;

class UserController
{
    /**
     * Retrieve the authenticated user identifier and class name.
     *
     * @param  \Cartalyst\Sentinel\Sentinel  $auth
     * @return array
     */
    public function user(Sentinel $auth)
    {
        $user = $auth->check();

        if (! $user) {
            return [];
        }

        return [
            'id' => $user->getUserId(),
            'className' => get_class($user),
        ];
    }

    /**
     * Login using the given user ID.
     *
     * @param  \Cartalyst\Sentinel\Sentinel  $auth
     * @param  \Illuminate\Contracts\Config\Repository  $config
     * @param  int  $userId
     * @return void
     */
    public function login(Sentinel $auth, Config $config, $userId)
    {
        $model = $config->get('cartalyst.sentinel.users.model', 'Cartalyst\Sentinel\Users\EloquentUser');

        if (str_contains($userId, '@')) {
            $user = (new $model)->where('email', $userId)->first();
        } else {
            $user = (new $model)->find($userId);
        }

        $auth->login($user);
    }

    /**
     * Log the user out of the application.
     *
     * @param  \Cartalyst\Sentinel\Sentinel  $auth
     * @return void
     */
    public function logout(Sentinel $auth)
    {
        $auth->logout();
    }
}
