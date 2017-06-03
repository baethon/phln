<?php

use function phln\logic\defaultTo;

class DefaultToTest extends \PHPUnit_Framework_TestCase
{
    /** @test */
    public function it_returns_default_value_on_null()
    {
        $this->assertEquals(42, defaultTo(42, null));
        $this->assertEquals('foo', defaultTo(42, 'foo'));
    }

    /** @test */
    public function it_is_curried()
    {
        $defaultTo42 = defaultTo(42);
        $this->assertEquals(42, $defaultTo42(null));
    }
}
