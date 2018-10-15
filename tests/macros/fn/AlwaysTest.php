<?php

use Baethon\Phln\Phln as P;

class AlwaysTest extends \PHPUnit\Framework\TestCase
{
    public function test_it_returns_set_value()
    {
        $f = P::always('foo');
        $this->assertEquals('foo', $f());
    }
}
