<?php

use Baethon\Phln as p;

class NotTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @param $value
     * @param $expected
     * @dataProvider notValueProvider
     */
    public function test_it_negates_passed_value($value, $expected)
    {
        $this->assertEquals($expected, p\not($value));
    }

    public function notValueProvider()
    {
        return [
            [false, true],
            [true, false],
            ['', true],
            [1, false],
            [0, true],
        ];
    }
}
