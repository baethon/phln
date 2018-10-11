<?php

use Baethon\Phln\Phln as P;

class MergeTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @dataProvider objectsProvider
     */
    public function test_it_merges_two_objects($left, $right)
    {
        $this->assertEquals(['a' => 1, 'b' => 2], P::merge($left, $right));
    }

    public function objectsProvider()
    {
        return [
            [['a' => 1], ['b' => 2]],
            [(object) ['a' => 1], (object) ['b' => 2]],
            [['a' => 1], (object) ['b' => 2]],
            [(object) ['a' => 1], ['b' => 2]],
        ];
    }
}
