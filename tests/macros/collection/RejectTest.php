<?php

use Baethon\Phln\Phln as P;

class RejectTest extends \PHPUnit\Framework\TestCase
{
    public function test_it_rejects_matching_values()
    {
        $p = function ($i) {
            return $i % 2 === 0;
        };

        $this->assertEquals([1, 3, 5], P::reject($p, [1, 2, 3, 4, 5]));
    }

    public function test_it_is_curried()
    {
        $f = P::reject(function ($i) {
            return $i % 2 === 0;
        });

        $this->assertEquals([1, 3, 5], $f([1, 2, 3, 4, 5]));
    }
}
