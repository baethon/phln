<?php

use Baethon\Phln\Phln as P;

class ArityTest extends \PHPUnit\Framework\TestCase
{
    public function test_it_returns_arity_of_function()
    {
        $this->assertEquals(1, P::arity(function ($a) {}));
        $this->assertEquals(2, P::arity(function ($a, $b) {}));
        $this->assertEquals(1, P::arity(function (...$a) {}));
        $this->assertEquals(2, P::arity(function ($a, ...$b) {}));
    }
}
