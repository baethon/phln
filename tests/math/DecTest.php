<?php

use const phln\math\dec;

class DecTest extends \Phln\Build\PhpUnit\TestCase
{
    public function getTestedFn(): string
    {
        return dec;
    }

    /** @test */
    public function it_decrements_value()
    {
        $this->assertEquals(1, $this->callFn(2));
    }

    /** @test */
    public function it_can_be_used_as_callback()
    {
        $numbers = [1, 2, 3];
        $mapped = array_map($this->getResolvedFn(), $numbers);

        $this->assertEquals([0, 1, 2], $mapped);
    }
}
