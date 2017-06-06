<?php

use const phln\collection\reject;

class RejectTest extends \Phln\Build\PhpUnit\TestCase
{
    public function getTestedFn(): string
    {
        return reject;
    }

    /** @test */
    public function it_rejects_matching_values()
    {
        $p = function ($i) {
            return $i % 2 === 0;
        };

        $this->assertEquals([1, 3, 5], $this->callFn($p, [1, 2, 3, 4, 5]));
    }

    /** @test */
    public function it_is_curried()
    {
        $f = $this->callFn(function ($i) {
            return $i % 2 === 0;
        });

        $this->assertEquals([1, 3, 5], $f([1, 2, 3, 4, 5]));
    }
}
