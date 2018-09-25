<?php

use const phln\logic\isEmpty;

class IsEmptyTest extends \Phln\Build\PhpUnit\TestCase
{
    public function getTestedFn(): string
    {
        return isEmpty;
    }

    /**
     * @test
     * @dataProvider emptyCheckDataProvider
     */
    public function it_tests_if_values_are_empty($value, $expected)
    {
        $this->assertEquals($expected, $this->callFn($value));
    }

    public function emptyCheckDataProvider()
    {
        return [
            ['', true],
            [[], true],
            [new stdClass(), true],
            [null, false],
            [false, false],
            [0, false],
            ['0', false],
            [(object) ['a' => 0], false],
            [(object) [], true],
            [['a' => 0], false],
        ];
    }
}
