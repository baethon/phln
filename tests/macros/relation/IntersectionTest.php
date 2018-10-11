<?php

use Baethon\Phln\Phln as P;

class IntersectionTest extends \PHPUnit\Framework\TestCase
{
    public function test_it_calculates_intersection()
    {
        $a = [1, 2, 3, 4, 5];
        $b = [5, 2, 7];

        $this->assertEquals([2, 5], P::intersection($a, $b));
    }
}
