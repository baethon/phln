<?php

use function phln\collection\all;
use const phln\collection\all;

class AllTest extends \PHPUnit_Framework_TestCase
{
    /** @test */
    public function it_checks_if_all_elements_match_predicate()
    {
        $list = [2, 4, 6, 8];
        $predicate = function ($i) {
            return $i % 2 === 0;
        };

        $this->assertTrue(all($predicate, $list));
        $this->assertFalse(all($predicate, [2, 4, 5]));
    }

    /** @test */
    public function it_is_curried()
    {
        $f = all(function ($i) {
            return $i % 2 === 0;
        });

        $this->assertTrue($f([2, 4, 6, 8]));
    }

    /** @test */
    public function it_can_be_used_as_callback()
    {
        $predicate = function ($i) {
            return $i % 2 === 0;
        };

        $this->assertTrue(call_user_func(all, $predicate, [2, 4]));
    }
}
