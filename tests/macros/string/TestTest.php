<?php

use Baethon\Phln\Phln as P;

class TestTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @dataProvider dataProvider
     */
    public function test_it_tests_given_string($regexp, $string, $expected)
    {
        $this->assertEquals($expected, P::test($regexp, $string));
    }

    public function dataProvider()
    {
        return [
            ['/foo/', 'foobar', true],
            [P::regexp('foo'), 'foobar', true],
            ['/foo/', 'barbar', false],
            [P::regexp('foo'), 'barbar', false],
            ['foo', 'foobar', true],
        ];
    }
}
