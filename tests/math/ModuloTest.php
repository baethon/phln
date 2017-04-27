<?php

use function phln\math\modulo;
use const phln\math\modulo;

class ModuloTest extends \PHPUnit_Framework_TestCase
{
    /** @test */
    public function it_calculates_modulo()
    {
        $this->assertEquals(1 % 2, modulo(1, 2));
    }

    /** @test */
    public function it_is_curried()
    {
        $f = modulo(1);
        $this->assertEquals(1 % 2, $f(2));
    }

    /** @test */
    public function it_can_be_used_as_callback()
    {
        $this->assertEquals(1 % 2, call_user_func(modulo, 1, 2));
    }
}
