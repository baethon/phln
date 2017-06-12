<?php

use const phln\relation\lt;

class LtTest extends \Phln\Build\PhpUnit\TestCase
{
    public function getTestedFn(): string
    {
        return lt;
    }

    /** @test */
    public function it_checks_if_value_is_lesser()
    {
        $this->assertTrue($this->callFn(1, 2));
        $this->assertFalse($this->callFn(2, 2));
        $this->assertFalse($this->callFn(1, -2));
    }

    /** @test */
    public function it_is_curried()
    {
        $f = $this->callFn(1);
        $this->assertTrue($f(2));
        $this->assertFalse($f(1));
        $this->assertFalse($f(-1));
    }
}
