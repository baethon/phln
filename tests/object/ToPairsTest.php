<?php

use const phln\object\toPairs;

class ToPairsTest extends \Phln\Build\PhpUnit\TestCase
{
    public function getTestedFn(): string
    {
        return toPairs;
    }

    /** @test  */
    public function it_converts_object_to_pairs()
    {
        $expected = [['foo', 1], ['bar', 2]];
        $this->assertEquals($expected, $this->callFn(['foo' => 1, 'bar' => 2]));
    }

    /** @test */
    public function it_supports_objects()
    {
        $expected = [['foo', 1], ['bar', 2]];
        $this->assertEquals($expected, $this->callFn((object) ['foo' => 1, 'bar' => 2]));
    }
}
