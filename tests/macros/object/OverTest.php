<?php

use Baethon\Phln\Phln as P;

class OverTest extends \PHPUnit\Framework\TestCase
{
    public function test_it_updates_using_lens()
    {
        $input = [1, 2, 3, 4, 5];
        $lens = P::lensIndex(1);
        $fn = function ($i) {
            return $i + 100;
        };

        $this->assertEquals([1, 102, 3, 4, 5], P::over($lens, $fn, $input));
    }
}
