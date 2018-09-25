<?php

use const phln\fn\negate;

class NegateTest extends \Phln\Build\PhpUnit\TestCase
{
    public function getTestedFn(): string
    {
        return negate;
    }

    /** @test */
    public function it_negates_predicate()
    {
        $isEven = function ($i) {
            return $i % 2 === 0;
        };

        $g = $this->callFn($isEven);
        $this->assertTrue($g(1));
    }
}
