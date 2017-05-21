<?php

use function phln\object\pick;
use const phln\object\pick;

class PickTest extends \PHPUnit_Framework_TestCase
{
    /** @test */
    public function it_picks_given_keys()
    {
        $this->assertEquals(['b' => 2], pick(['b'], ['a' => 1, 'b' => 2, 'c' => 3]));
    }

    /** @test */
    public function it_skips_undefined_keys()
    {
        $this->assertEquals([], pick(['c'], ['a' => 1]));
    }

    /** @test */
    public function it_is_curried()
    {
        $pickA = pick(['a']);
        $this->assertEquals(['a' => 1], $pickA(['a' => 1, 'b' => 2]));
    }
}
