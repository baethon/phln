<?php

use Baethon\Phln as p;

class FromPairsTest extends \PHPUnit\Framework\TestCase
{
    public function test_it_converts_collection_to_object()
    {
        $expected = ['foo' => 1, 'bar' => 2];
        $this->assertEquals($expected, p\from_pairs([['foo', 1], ['bar', 2]]));
    }
}
