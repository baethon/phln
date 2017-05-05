<?php

use function phln\collection\contains;
use const phln\collection\contains;

class ContainsTest extends \PHPUnit_Framework_TestCase
{
    /** @test */
    public function it_checks_if_value_is_in_array()
    {
        $this->assertTrue(contains(1, [1, 2, 3]));
        $this->assertFalse(contains('1', [1, 2, 3]));
    }

    /** @test */
    public function it_is_curried()
    {
        $p = contains(1);
        $this->assertTrue($p([1, 2, 3]));
    }

    /** @test */
    public function it_can_be_used_as_callback()
    {
        $this->assertTrue(call_user_func(contains, 1, [1]));
    }
}
