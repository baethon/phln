<?php

use Baethon\Phln\Phln as P;

class DifferenceTest extends \PHPUnit\Framework\TestCase
{
    public function test_it_returns_diff()
    {
        $a = [1, 2, 3, 4];
        $b = [1];

        $this->assertEquals([2, 3, 4], P::difference($a, $b));
    }
}
