<?php

use function phln\collection\concat;
use const phln\collection\concat;

class ConcatTest extends \Phln\Build\PhpUnit\TestCase
{
    public function getTestedFn(): string
    {
        return concat;
    }

    /** @test */
    public function it_concatenates_two_arrays()
    {
        $this->assertEquals([1, 2], $this->callFn([1], [2]));
    }

    /** @test */
    public function it_concatenates_two_strings()
    {
        $this->assertEquals('ABCD', $this->callFn('AB', 'CD'));
    }

    /** @test */
    public function it_is_curried()
    {
        $appendToA = $this->callFn(['A']);
        $this->assertEquals(['A', 'B'], $appendToA(['B']));
    }

    /**
     * @test
     * @dataProvider exceptionsDataProvider
     */
    public function it_throws_exception($a, $b)
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->callFn($a, $b);
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
