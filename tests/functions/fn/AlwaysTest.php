<?php

use Baethon\Phln as p;

class AlwaysTest extends \PHPUnit\Framework\TestCase
{
    public function test_it_returns_set_value()
    {
        $f = p\always('foo');
        $this->assertEquals('foo', $f());
    }
}
