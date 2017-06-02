<?php

use PHPUnit\Framework\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    protected function tearDown()
    {
        parent::tearDown();

        Mockery::close();
    }
}
