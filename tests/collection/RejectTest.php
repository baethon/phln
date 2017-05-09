<?php

use function phln\collection\reject;

class RejectTest extends \PHPUnit_Framework_TestCase
{
    /** @test */
    public function it_rejects_matching_values()
    {
        $p = function ($i) {
            return $i % 2 === 0;
        };

        $this->assertEquals([1, 3, 5], reject($p, [1, 2, 3, 4, 5]));
    }

    /** @test */
    public function it_is_curried()
    {
        $f = reject(function ($i) {
            return $i % 2 === 0;
        });

        $this->assertEquals([1, 3, 5], $f([1, 2, 3, 4, 5]));
    }
}
