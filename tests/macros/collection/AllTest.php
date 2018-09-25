<?php

use const phln\collection\all;

class AllTest extends \Phln\Build\PhpUnit\TestCase
{
    function getTestedFn(): string
    {
        return all;
    }

    /** @test */
    public function it_checks_if_all_elements_match_predicate()
    {
        $list = [2, 4, 6, 8];
        $predicate = function ($i) {
            return $i % 2 === 0;
        };

        $this->assertTrue($this->callFn($predicate, $list));
        $this->assertFalse($this->callFn($predicate, [2, 4, 5]));
    }

    /** @test */
    public function it_is_curried()
    {
        $f = $this->callFn(function ($i) {
            return $i % 2 === 0;
        });

        $this->assertTrue($f([2, 4, 6, 8]));
    }
}
