<?php

use function phln\fn\always;

class AlwaysTest extends \PHPUnit_Framework_TestCase
{
    /** @test */
    public function it_returns_set_value()
    {
        $f = always('foo');
        $this->assertEquals('foo', $f());
    }
}
