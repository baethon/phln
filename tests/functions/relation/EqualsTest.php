<?php

use Baethon\Phln as p;

class EqualsTest extends \PHPUnit\Framework\TestCase
{
    public function test_it_checks_if_values_are_equal()
    {
        $this->assertTrue(p\equals(1, 1));
        $this->assertFalse(p\equals(1, '1'));
    }
}
