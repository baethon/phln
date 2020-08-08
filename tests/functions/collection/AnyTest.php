<?php

use Baethon\Phln as p;

class AnyTest extends \PHPUnit\Framework\TestCase
{
    public function test_it_checks_if_any_element_of_array_match_predicate()
    {
        $predicate = function ($i) {
            return $i > 4;
        };

        $this->assertTrue(p\any([1, 2, 4, 5], $predicate));
        $this->assertFalse(p\any([1, 2], $predicate));
    }
}
