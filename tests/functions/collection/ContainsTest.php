<?php

use Baethon\Phln as p;

class ContainsTest extends \PHPUnit\Framework\TestCase
{
    public function test_it_checks_if_value_is_in_array()
    {
        $this->assertTrue(p\contains([1, 2, 3], 1));
        $this->assertFalse(p\contains([1, 2, 3], '1'));
    }

    public function test_it_checks_if_string_contains_value()
    {
        $this->assertTrue(p\contains('barfooasd', 'foo'));
        $this->assertFalse(p\contains('bar', 'foo'));
    }

    public function test_it_returns_false_for_non_supported_types()
    {
        $this->assertFalse(p\contains(1, 'foo'));
    }
}
