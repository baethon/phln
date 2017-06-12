<?php

use const phln\fn\always;

class AlwaysTest extends \Phln\Build\PhpUnit\TestCase
{
    public function getTestedFn(): string
    {
        return always;
    }

    /** @test */
    public function it_returns_set_value()
    {
        $f = $this->callFn('foo');
        $this->assertEquals('foo', $f());
    }
}
