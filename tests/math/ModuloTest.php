<?php

use const phln\math\modulo;

class ModuloTest extends \Phln\Build\PhpUnit\TestCase
{
    public function getTestedFn(): string
    {
        return modulo;
    }

    /** @test */
    public function it_calculates_modulo()
    {
        $this->assertEquals(1 % 2, $this->callFn(1, 2));
    }

    /** @test */
    public function it_is_curried()
    {
        $f = $this->callFn(1);
        $this->assertEquals(1 % 2, $f(2));
    }

    /** @test */
    public function it_can_be_used_as_callback()
    {
        $this->assertEquals(1 % 2, call_user_func($this->getResolvedFn(), 1, 2));
    }
}
