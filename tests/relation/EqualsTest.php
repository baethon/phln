<?php

use const phln\relation\equals;

class EqualsTest extends \Phln\Build\PhpUnit\TestCase
{
    public function getTestedFn(): string
    {
        return equals;
    }

    /** @test */
    public function it_checks_if_values_are_equal()
    {
        $this->assertTrue($this->callFn(1, 1));
        $this->assertFalse($this->callFn(1, '1'));
    }

    /** @test */
    public function it_is_curried()
    {
        $f = $this->callFn(1);
        $this->assertTrue($f(1));
    }

    /** @test */
    public function it_can_be_used_as_callback()
    {
        $this->assertTrue(call_user_func($this->getResolvedFn(), 1, 1));
    }
}
