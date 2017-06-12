<?php

use const phln\relation\lte;

class LteTest extends \Phln\Build\PhpUnit\TestCase
{
    public function getTestedFn(): string
    {
        return lte;
    }

    /** @test */
    public function it_checks_if_value_is_less_or_equal()
    {
        $this->assertTrue($this->callFn(1, 1));
        $this->assertTrue($this->callFn(1, 2));
        $this->assertFalse($this->callFn(3, 2));
    }

    /** @test */
    public function it_is_curried()
    {
        $f = $this->callFn(1);

        $this->assertTrue($f(2));
        $this->assertTrue($f(1));
        $this->assertFalse($f(-1));
    }
}
