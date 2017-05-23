<?php

use function phln\object\values;
use const phln\object\values;

class ValuesTest extends \PHPUnit_Framework_TestCase
{
    /** @test */
    public function it_returns_values()
    {
        $this->assertEquals([1, 2, 3], values(['a' => 1, 'b' => 2, 'c' => 3]));
    }

    /** @test */
    public function it_can_be_used_as_callback()
    {
        $this->assertEquals([1, 2, 3], call_user_func(values, ['a' => 1, 'b' => 2, 'c' => 3]));
    }
}
