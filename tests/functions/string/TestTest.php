<?php

use Baethon\Phln as p;

class TestTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @dataProvider dataProvider
     */
    public function test_it_tests_given_string($regexp, $string, $expected)
    {
        $this->assertEquals($expected, p\test($string, $regexp));
    }

    public function dataProvider()
    {
        return [
            ['/foo/', 'foobar', true],
            [p\regexp('foo'), 'foobar', true],
            ['/foo/', 'barbar', false],
            [p\regexp('foo'), 'barbar', false],
            ['foo', 'foobar', true],
        ];
    }
}
