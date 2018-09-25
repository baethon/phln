<?php

use const phln\string\test;
use function phln\string\regexp;

class TestTest extends \Phln\Build\PhpUnit\TestCase
{
    public function getTestedFn(): string {
        return test;
    }

    /**
     * @test
     * @dataProvider dataProvider
     */
    public function it_tests_given_string($regexp, $string, $expected)
    {
        $this->assertEquals($expected, $this->callFn($regexp, $string));
    }

    public function dataProvider()
    {
        return [
            ['/foo/', 'foobar', true],
            [regexp('foo'), 'foobar', true],
            ['/foo/', 'barbar', false],
            [regexp('foo'), 'barbar', false],
            ['foo', 'foobar', true],
        ];
    }

    /** @test */
    public function it_is_curried()
    {
        $fn = $this->callFn('/foo/');
        $this->assertTrue($fn('foobar'));
    }
}
