<?php

use const phln\logic\defaultTo;

class DefaultToTest extends \Phln\Build\PhpUnit\TestCase
{
    public function getTestedFn(): string
    {
        return defaultTo;
    }

    /** @test */
    public function it_returns_default_value_on_null()
    {
        $this->assertEquals(42, $this->callFn(42, null));
        $this->assertEquals('foo', $this->callFn(42, 'foo'));
    }

    /** @test */
    public function it_is_curried()
    {
        $defaultTo42 = $this->callFn(42);
        $this->assertEquals(42, $defaultTo42(null));
    }
}
