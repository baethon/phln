<?php

use Baethon\Phln as p;

class GtTest extends \PHPUnit\Framework\TestCase
{
    public function test_it_checks_if_value_is_greater()
    {
        $this->assertFalse(p\gt(1, 2));
        $this->assertFalse(p\gt(2, 2));
        $this->assertTrue(p\gt(3, 2));
    }
}
