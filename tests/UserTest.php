<?php

use Cartalyst\Sentinel\Sentinel;
use Rymanalu\DuskForSentinel\Http\Controllers\UserController;

class UserTest extends TestCase
{
    /** @test */
    public function it_returns_an_empty_array_if_user_is_not_authenticated()
    {
        $authenticatedUser = $this->getAuthenticatedUser(false);

        $this->assertTrue(is_array($authenticatedUser));
        $this->assertEmpty($authenticatedUser);
        $this->assertEquals([], $authenticatedUser);
    }

    /** @test */
    public function it_returns_the_id_and_class_name_of_authenticated_user()
    {
        $authenticatedUser = $this->getAuthenticatedUser(new User);

        $this->assertTrue(is_array($authenticatedUser));
        $this->assertArrayHasKey('id', $authenticatedUser);
        $this->assertArrayHasKey('className', $authenticatedUser);
        $this->assertEquals(12, $authenticatedUser['id']);
        $this->assertEquals(User::class, $authenticatedUser['className']);
    }

    protected function getAuthenticatedUser($returnOfCheckMethod)
    {
        $auth = Mockery::mock(Sentinel::class);
        $auth->shouldReceive('check')
             ->andReturn($returnOfCheckMethod);

        $controller = new UserController;

        return $controller->user($auth);
    }
}
