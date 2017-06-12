<?php

use const phln\logic\ƛand;

class AndTest extends \Phln\Build\PhpUnit\TestCase
{
    public function getTestedFn(): string
    {
        return ƛand;
    }

    /** @test */
    public function it_checks_if_both_values_are_true()
    {
        $this->assertTrue($this->callFn(true, true));
        $this->assertFalse($this->callFn(true, false));
        $this->assertTrue($this->callFn(true, 1));
        $this->assertFalse($this->callFn(false, false));
    }

    /** @test */
    public function it_is_curried()
    {
        $f = $this->callFn(true);
        $this->assertTrue($f(true));
        $this->assertFalse($f(false));
    }
}
