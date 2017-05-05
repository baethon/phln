<?php

use function phln\fn\negate;
use const phln\fn\negate;

class NegateTest extends \PHPUnit_Framework_TestCase
{
    /** @test */
    public function it_negates_predicate()
    {
        $isEven = function ($i) {
            return $i % 2 === 0;
        };

        $g = negate($isEven);
        $this->assertTrue($g(1));
    }

    /** @test */
    public function it_can_be_used_as_callback()
    {
        $onlyZero = function ($i) {
            return $i === 0;
        };

        $g = call_user_func(negate, $onlyZero);
        $this->assertTrue($g(1));
    }
}
