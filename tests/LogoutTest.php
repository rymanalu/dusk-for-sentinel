<?php

use Cartalyst\Sentinel\Sentinel;
use Rymanalu\DuskForSentinel\Http\Controllers\UserController;

class LogoutTest extends TestCase
{
    /** @test */
    public function it_logging_out_current_authenticated_user()
    {
        $auth = Mockery::mock(Sentinel::class);
        $auth->shouldReceive('logout')
             ->andReturn(true);

        $controller = new UserController;

        $this->assertEquals(null, $controller->logout($auth));
    }
}
