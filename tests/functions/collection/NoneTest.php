<?php

use Baethon\Phln as p;

class NoneTest extends \PHPUnit\Framework\TestCase
{
    public function test_it_checks_if_none_elements_match_predicament()
    {
        $p = function ($i) {
            return $i > 2;
        };

        $this->assertTrue(p\none([1, 2], $p));
        $this->assertFalse(p\none([1, 2, 3], $p));
    }
}
