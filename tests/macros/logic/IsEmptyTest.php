<?php

use Baethon\Phln\Phln as P;

class IsEmptyTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @dataProvider emptyCheckDataProvider
     */
    public function test_it_tests_if_values_are_empty($value, $expected)
    {
        $this->assertEquals($expected, P::isEmpty($value));
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
