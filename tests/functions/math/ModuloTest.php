<?php

use Baethon\Phln as p;

class ModuloTest extends \PHPUnit\Framework\TestCase
{
    public function test_it_calculates_modulo()
    {
        $this->assertEquals(1 % 2, p\modulo(1, 2));
    }

    public function test_it_supports_floats()
    {
        $this->assertEquals(fmod(1, 0.5), p\modulo(1, 0.5));
        $this->assertEquals(fmod(1.5, 2), p\modulo(1.5, 2));
    }
}
