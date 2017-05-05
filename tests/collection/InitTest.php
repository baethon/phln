<?php

use function phln\collection\init;
use const phln\collection\init;

class InitTest extends \PHPUnit_Framework_TestCase
{
    /** @test */
    public function it_returns_list_without_last_element()
    {
        $this->assertEquals([1, 2], init([1, 2, 3]));
        $this->assertEquals([1], init([1, 2]));
        $this->assertEquals([], init([1]));
        $this->assertEquals([], init([]));
    }

    /** @test */
    public function it_can_be_used_as_callback()
    {
        $this->assertEquals([1, 2], call_user_func(init, [1, 2, 3]));
    }
}
