<?php

use Baethon\Phln as p;

class LteTest extends \PHPUnit\Framework\TestCase
{
    public function test_it_checks_if_value_is_less_or_equal()
    {
        $this->assertTrue(p\lte(1, 1));
        $this->assertTrue(p\lte(1, 2));
        $this->assertFalse(p\lte(3, 2));
    }
}
