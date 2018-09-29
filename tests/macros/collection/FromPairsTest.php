<?php

use Baethon\Phln\Phln as P;

class FromPairsTest extends \PHPUnit\Framework\TestCase
{
    public function test_it_converts_collection_to_object()
    {
        $expected = ['foo' => 1, 'bar' => 2];
        $this->assertEquals($expected, P::fromPairs([['foo', 1], ['bar', 2]]));
    }
}
