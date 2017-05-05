<?php

use function phln\collection\join;

class JoinTest extends \PHPUnit_Framework_TestCase
{
    /** @test */
    public function it_joins_array_elements()
    {
        $this->assertEquals('1,2,3', join(',', [1, 2, 3]));
    }

    /** @test */
    public function it_is_curried()
    {
        $spacer = join(' ');
        $this->assertEquals('1 2 3', $spacer([1, 2, 3]));
    }
}
