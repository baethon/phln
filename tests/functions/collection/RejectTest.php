<?php

use Baethon\Phln as p;

class RejectTest extends \PHPUnit\Framework\TestCase
{
    public function test_it_rejects_matching_values()
    {
        $p = function ($i) {
            return $i % 2 === 0;
        };

        $this->assertEquals([1, 3, 5], p\reject([1, 2, 3, 4, 5], $p));
    }
}
