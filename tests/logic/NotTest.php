<?php

use const phln\logic\not;

class NotTest extends \Phln\Build\PhpUnit\TestCase
{
    public function getTestedFn(): string
    {
        return not;
    }

    /**
     * @param $value
     * @param $expected
     * @test
     * @dataProvider notValueProvider
     */
    public function it_negates_passed_value($value, $expected)
    {
        $this->assertEquals($expected, $this->callFn($value));
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
