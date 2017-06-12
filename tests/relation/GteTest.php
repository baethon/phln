<?php

use const phln\relation\gte;

class GteTest extends \Phln\Build\PhpUnit\TestCase
{
    public function getTestedFn(): string
    {
        return gte;
    }

    /** @test */
    public function it_checks_if_value_is_greater_or_equal()
    {
        $this->assertTrue($this->callFn(2, 2));
        $this->assertTrue($this->callFn(2, 1));
        $this->assertFalse($this->callFn(2, 3));
    }

    /** @test */
    public function it_is_curried()
    {
        $f = $this->callFn(2);
        $this->assertTrue($f(2));
        $this->assertTrue($f(1));
        $this->assertFalse($f(3));
    }
}
