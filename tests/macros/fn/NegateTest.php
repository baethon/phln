<?php

use Baethon\Phln\Phln as P;

class NegateTest extends \PHPUnit\Framework\TestCase
{
    public function test_it_negates_predicate()
    {
        $isEven = function ($i) {
            return $i % 2 === 0;
        };

        $g = P::negate($isEven);
        $this->assertTrue($g(1));
    }
}
