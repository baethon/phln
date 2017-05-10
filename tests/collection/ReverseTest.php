<?php

use function phln\collection\reverse;

class ReverseTest extends \PHPUnit_Framework_TestCase
{
    /** @test */
    public function it_reverses_array()
    {
        $list = range(1, 10);
        $this->assertEquals(array_reverse($list), reverse($list));
    }
}
