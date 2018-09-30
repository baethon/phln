<?php

use Baethon\Phln\Phln as P;

class DefaultToTest extends \PHPUnit\Framework\TestCase
{
    public function test_it_returns_default_value_on_null()
    {
        $this->assertEquals(42, P::defaultTo(42, null));
        $this->assertEquals('foo', P::defaultTo(42, 'foo'));
    }

    public function test_it_is_curried()
    {
        $defaultTo42 = P::defaultTo(42);
        $this->assertEquals(42, $defaultTo42(null));
    }
}
