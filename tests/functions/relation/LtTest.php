<?php

use Baethon\Phln as p;

class LtTest extends \PHPUnit\Framework\TestCase
{
    public function test_it_checks_if_value_is_lesser()
    {
        $this->assertTrue(p\lt(1, 2));
        $this->assertFalse(p\lt(2, 2));
        $this->assertFalse(p\lt(1, -2));
    }
}
