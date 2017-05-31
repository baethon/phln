<?php

use function phln\fn\arity;

class ArityTest extends \PHPUnit_Framework_TestCase
{
    /** @test */
    public function it_returns_arity_of_function()
    {
        $this->assertEquals(1, arity(function ($a) {}));
        $this->assertEquals(2, arity(function ($a, $b) {}));
        $this->assertEquals(1, arity(function (...$a) {}));
        $this->assertEquals(2, arity(function ($a, ...$b) {}));
    }
}
