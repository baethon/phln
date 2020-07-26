<?php

use Baethon\Phln\Phln as P;

class ContainsTest extends \PHPUnit\Framework\TestCase
{
    public function test_it_checks_if_value_is_in_array()
    {
        $this->assertTrue(P::contains(1, [1, 2, 3]));
        $this->assertFalse(P::contains('1', [1, 2, 3]));
    }

    public function test_it_checks_if_string_contains_value()
    {
        $this->assertTrue(P::contains('foo', 'barfooasd'));
        $this->assertFalse(P::contains('foo', 'bar'));
    }

    public function test_it_returns_false_for_non_supported_types()
    {
        $this->assertFalse(P::contains('foo', 1));
    }
}
