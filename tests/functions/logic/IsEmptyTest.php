<?php

use Baethon\Phln as p;

class IsEmptyTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @dataProvider emptyCheckDataProvider
     */
    public function test_it_tests_if_values_are_empty($value, $expected)
    {
        $this->assertEquals($expected, p\is_empty($value));
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
