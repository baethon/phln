<?php

use function phln\collection\collapse;
use const phln\collection\collapse;

class CollapseTest extends \PHPUnit_Framework_TestCase
{
    /** @test */
    public function it_flattens_array_by_one_level()
    {
        $this->assertEquals([1, 2, [3]], collapse([[1], [2], [[3]]]));
        $this->assertEquals([1, 2, [3]], collapse([[1, 2], [[3]]]));
    }

    /** @test */
    public function it_can_be_used_as_callback()
    {
        $this->assertEquals([1], call_user_func(collapse, [[1]]));
    }
}
