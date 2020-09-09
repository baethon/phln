<?php

use Baethon\Phln as p;

class DefaultToTest extends \PHPUnit\Framework\TestCase
{
    public function test_it_returns_default_value_on_null()
    {
        $this->assertEquals(42, p\default_to(null, 42));
        $this->assertEquals('foo', p\default_to('foo', 42));
        $this->assertFalse(p\default_to(false, 42));
    }
}
