<?php

use const phln\fn\arity;

class ArityTest extends \Phln\Build\PhpUnit\TestCase
{
    public function getTestedFn(): string
    {
        return arity;
    }

    /** @test */
    public function it_returns_arity_of_function()
    {
        $this->assertEquals(1, $this->callFn(function ($a) {}));
        $this->assertEquals(2, $this->callFn(function ($a, $b) {}));
        $this->assertEquals(1, $this->callFn(function (...$a) {}));
        $this->assertEquals(2, $this->callFn(function ($a, ...$b) {}));
    }
}
