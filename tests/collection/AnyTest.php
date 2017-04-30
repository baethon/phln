<?php

use function phln\collection\any;
use const phln\collection\any;

class AnyTest extends \PHPUnit_Framework_TestCase
{
    /** @test */
    public function it_checks_if_any_element_of_array_match_predicate()
    {
        $predicate = function ($i) {
            return $i > 4;
        };

        $this->assertTrue(any($predicate, [1, 2, 4, 5]));
        $this->assertFalse(any($predicate, [1, 2]));
    }

    /** @test */
    public function it_is_curried()
    {
        $f = any(function ($i) {
            return $i > 2;
        });

        $this->assertTrue($f([1, 2, 3]));
    }

    /** @test */
    public function it_can_be_used_as_callback()
    {
        $predicate = function ($i) {
            return $i === 2;
        };

        $this->assertTrue(call_user_func(any, $predicate, [1, 2]));
    }
}
