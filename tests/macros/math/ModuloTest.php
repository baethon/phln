<?php

use Baethon\Phln\Phln as P;

class ModuloTest extends \PHPUnit\Framework\TestCase
{
    public function test_it_calculates_modulo()
    {
        $this->assertEquals(1 % 2, P::modulo(1, 2));
    }
}
