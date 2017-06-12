<?php

use const phln\logic\ƛor;

class OrTest extends \Phln\Build\PhpUnit\TestCase
{
    public function getTestedFn(): string
    {
        return ƛor;
    }

    /** @test */
    public function it_checks_if_at_least_one_value_is_true()
    {
        $this->assertTrue($this->callFn(false, true));
        $this->assertTrue($this->callFn(true, false));
        $this->assertTrue($this->callFn(true, true));
        $this->assertFalse($this->callFn(false, false));
    }

    /** @test */
    public function it_is_curried()
    {
        $f = $this->callFn(true);
        $this->assertTrue($f(false));
    }
}
