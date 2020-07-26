<?php

use Baethon\Phln\Phln as P;

class PartitionTest extends \PHPUnit\Framework\TestCase
{
    public function test_it_splits_array_using_predicate()
    {
        $p = function ($string) {
            return (bool) preg_match('/fo/', $string);
        };

        $collection = ['abc', 'jon', 'foo', 'snow', 'foo bar', 'fon'];

        $expected = [
            ['foo', 'foo bar', 'fon'],
            ['abc', 'jon', 'snow'],
        ];

        $this->assertEquals($expected, P::partition($p, $collection));
    }
}
