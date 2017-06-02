<?php

use function phln\logic\not;

class NotTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @param $value
     * @param $expected
     * @test
     * @dataProvider notValueProvider
     */
    public function it_negates_passed_value($value, $expected)
    {
        $this->assertEquals($expected, not($value));
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
