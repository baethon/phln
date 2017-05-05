<?php

use function phln\collection\tail;
use const phln\collection\tail;

class TailTest extends \PHPUnit_Framework_TestCase
{
    /** @test */
    public function it_returns_tail_of_array()
    {
        $this->assertEquals([2, 3, 4], tail([1, 2, 3, 4]));
        $this->assertEquals([], tail([1]));
        $this->assertEquals([], tail([]));
    }

    /** @test */
    public function it_can_be_used_as_callback()
    {
        $this->assertEquals([2, 3], call_user_func(tail, [1, 2, 3]));
    }
}
