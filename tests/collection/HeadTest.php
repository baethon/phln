<?php

use function phln\collection\head;
use const phln\collection\head;

class HeadTest extends \PHPUnit_Framework_TestCase
{
    /** @test */
    public function it_returns_head_of_array()
    {
        $this->assertEquals(1, head([1, 2, 3]));
        $this->assertNull(head([]));
    }

    /** @test */
    public function it_can_be_used_as_callback()
    {
        $this->assertEquals('a', call_user_func(head, ['a', 'b', 'c']));
    }
}
