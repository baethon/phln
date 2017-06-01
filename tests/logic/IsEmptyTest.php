<?php

use function phln\logic\isEmpty;

class IsEmptyTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     * @dataProvider emptyCheckDataProvider
     */
    public function it_tests_if_values_are_empty($value, $expected)
    {
        $this->assertEquals($expected, isEmpty($value));
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
