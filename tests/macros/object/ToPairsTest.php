<?php

use Baethon\Phln\Phln as P;

class ToPairsTest extends \PHPUnit\Framework\TestCase
{
    public function test_it_converts_object_to_pairs()
    {
        $expected = [['foo', 1], ['bar', 2]];
        $this->assertEquals($expected, P::toPairs(['foo' => 1, 'bar' => 2]));
    }

    public function test_it_supports_objects()
    {
        $expected = [['foo', 1], ['bar', 2]];
        $this->assertEquals($expected, P::toPairs((object) ['foo' => 1, 'bar' => 2]));
    }
}
