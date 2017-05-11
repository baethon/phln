<?php

use function phln\collection\unique;
use const phln\collection\unique;

class UniqueTest extends \PHPUnit_Framework_TestCase
{
    /** @test */
    public function it_returns_unique_elements()
    {
        $this->assertEquals([1, 3, 2], unique([1, 3, 3, 2, 1, 1]));
        $this->assertEquals([1, '1'], unique([1, '1', 1]));
        $this->assertEquals([[42]], unique([[42], [42]]));
    }

    /** @test */
    public function it_can_be_used_as_callback()
    {
        $range = range(0, 10);

        $this->assertEquals($range, call_user_func(unique, array_merge($range, $range)));
    }
}
