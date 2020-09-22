<?php

use Baethon\Phln as p;

class GteTest extends \PHPUnit\Framework\TestCase
{
    public function test_it_checks_if_value_is_greater_or_equal()
    {
        $this->assertTrue(p\gte(2, 2));
        $this->assertTrue(p\gte(2, 1));
        $this->assertFalse(p\gte(2, 3));
    }
}
