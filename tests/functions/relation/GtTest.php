<?php

use Baethon\Phln\Phln as P;

class GtTest extends \PHPUnit\Framework\TestCase
{
    public function test_it_checks_if_value_is_greater()
    {
        $this->assertTrue(P::gt(2, 1));
        $this->assertFalse(P::gt(2, 2));
        $this->assertFalse(P::gt(2, 3));
    }
}
