<?php

use Baethon\Phln as p;

class NegateTest extends \PHPUnit\Framework\TestCase
{
    public function test_it_negates_predicate()
    {
        $isEven = function ($i) {
            return $i % 2 === 0;
        };

        $g = p\negate($isEven);
        $this->assertTrue($g(1));
    }
}
