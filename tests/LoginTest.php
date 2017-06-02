<?php

use Cartalyst\Sentinel\Sentinel;
use Illuminate\Contracts\Config\Repository as Config;
use Rymanalu\DuskForSentinel\Http\Controllers\UserController;

class LoginTest extends TestCase
{
    /** @test */
    public function it_authenticate_user_by_given_user_id()
    {
        $user = new User;

        $config = Mockery::mock(Config::class);
        $config->shouldReceive('get')
               ->with('cartalyst.sentinel.users.model', 'Cartalyst\Sentinel\Users\EloquentUser')
               ->andReturn('User');

        $auth = Mockery::mock(Sentinel::class);
        $auth->shouldReceive('login')
             ->andReturnNull();

        $controller = new UserController;

        $this->assertEquals(null, $controller->login($auth, $config, 12));
    }
}
