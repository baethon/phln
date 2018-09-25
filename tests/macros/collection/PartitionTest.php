<?php

use const phln\collection\partition;

class PartitionTest extends \Phln\Build\PhpUnit\TestCase
{
    public function getTestedFn(): string
    {
        return partition;
    }

    /** @test  */
    public function it_splits_array_using_predicate()
    {
        $p = function ($string) {
            return (bool) preg_match('/fo/', $string);
        };

        $collection = ['abc', 'jon', 'foo', 'snow', 'foo bar', 'fon'];

        $expected = [
            ['foo', 'foo bar', 'fon'],
            ['abc', 'jon', 'snow'],
        ];

        $this->assertEquals($expected, $this->callFn($p, $collection));
    }

    /** @test */
    public function it_is_curried()
    {
        $p = function ($i) {
            return $i % 2 === 0;
        };

        $f = $this->callFn($p);

        $collection = [1, 2, 3, 4];
        $expected = [[2, 4], [1, 3]];

        $this->assertEquals($expected, $f($collection));
    }
}
