<?php

use const phln\math\inc;

class IncTest extends \Phln\Build\PhpUnit\TestCase
{
    public function getTestedFn(): string
    {
        return inc;
    }

    /** @test */
    public function it_increments_value()
    {
        $this->assertEquals(3, $this->callFn(2));
    }

    /** @test */
    public function it_can_be_used_as_callback()
    {
        $numbers = [1, 2, 3];
        $mapped = array_map($this->getResolvedFn(), $numbers);

        $this->assertEquals([2, 3, 4], $mapped);
    }
}
