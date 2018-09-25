<?php

use const phln\relation\gt;

class GtTest extends \Phln\Build\PhpUnit\TestCase
{
    public function getTestedFn(): string
    {
        return gt;
    }

    /** @test */
    public function it_checks_if_value_is_greater()
    {
        $this->assertTrue($this->callFn(2, 1));
        $this->assertFalse($this->callFn(2, 2));
        $this->assertFalse($this->callFn(2, 3));
    }

    /** @test */
    public function it_is_curried()
    {
        $f = $this->callFn(2);
        $this->assertTrue($f(1));
    }
}
