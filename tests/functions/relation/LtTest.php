<?php

use Baethon\Phln\Phln as P;

class LtTest extends \PHPUnit\Framework\TestCase
{
    public function test_it_checks_if_value_is_lesser()
    {
        $this->assertTrue(P::lt(1, 2));
        $this->assertFalse(P::lt(2, 2));
        $this->assertFalse(P::lt(1, -2));
    }
}
