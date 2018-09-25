<?php

use Baethon\Phln\Phln as P;

class ConcatTest extends \PHPUnit\Framework\TestCase
{
    public function test_it_concatenates_two_arrays()
    {
        $this->assertEquals([1, 2], P::concat([1], [2]));
    }

    public function test_it_concatenates_two_strings()
    {
        $this->assertEquals('ABCD', P::concat('AB', 'CD'));
    }

    public function test_it_is_curried()
    {
        $appendToA = P::concat(['A']);
        $this->assertEquals(['A', 'B'], $appendToA(['B']));
    }

    /**
     * @dataProvider exceptionsDataProvider
     */
    public function test_it_throws_exception($a, $b)
    {
        $this->expectException(\InvalidArgumentException::class);
        P::concat($a, $b);
    }

    public function exceptionsDataProvider()
    {
        return [
            ['foo', ['bar']],
            [['foo'], 'bar'],
            [1, 2],
        ];
    }
}
