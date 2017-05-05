<?php

use function phln\collection\last;
use const phln\collection\last;

class LastTest extends \PHPUnit_Framework_TestCase
{
    /** @test */
    public function it_returns_last_element_of_array()
    {
        $this->assertEquals(3, last([1, 2, 3]));
        $this->assertNull(last([]));
    }

    /** @test */
    public function it_can_be_used_as_callback()
    {
        $this->assertEquals(3, call_user_func(last, [1, 2, 3]));
    }
}
