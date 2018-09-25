<?php

use const phln\collection\fromPairs;

class FromPairsTest extends \Phln\Build\PhpUnit\TestCase
{
    public function getTestedFn(): string
    {
        return fromPairs;
    }

    /** @test  */
    public function it_converts_collection_to_object()
    {
        $expected = ['foo' => 1, 'bar' => 2];
        $this->assertEquals($expected, $this->callFn([['foo', 1], ['bar', 2]]));
    }
}
