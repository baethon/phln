<?php

use const phln\collection\unique;

class UniqueTest extends \Phln\Build\PhpUnit\TestCase
{
    public function getTestedFn(): string
    {
        return unique;
    }

    /** @test */
    public function it_returns_unique_elements()
    {
        $this->assertEquals([1, 3, 2], $this->callFn([1, 3, 3, 2, 1, 1]));
        $this->assertEquals([1, '1'], $this->callFn([1, '1', 1]));
        $this->assertEquals([[42]], $this->callFn([[42], [42]]));
    }
}
