<?php

use Baethon\Phln as p;

class AllTest extends \PHPUnit\Framework\TestCase
{
    public function test_it_checks_if_all_elements_match_predicate()
    {
        $list = [2, 4, 6, 8];
        $predicate = function ($i) {
            return $i % 2 === 0;
        };

        $this->assertTrue(p\all($list, $predicate));
        $this->assertFalse(p\all([2, 4, 5], $predicate));
    }
}
