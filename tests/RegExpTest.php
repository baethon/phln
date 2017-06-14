<?php

use phln\RegExp;

class RegExpTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     * @dataProvider castToStringProvider
     * @param $pattern
     * @param $modifiers
     * @param $expected
     */
    public function it_casts_to_string($pattern, $modifiers, $expected)
    {
        $this->assertEquals($expected, (string) new RegExp($pattern, $modifiers));
    }

    public function castToStringProvider()
    {
        return [
            ['/foo/', '', '/foo/'],
            ['/foo/', 'i', '/foo/i'],
            ['/foo/', 'ig', '/foo/i'],
        ];
    }


    /**
     * @test
     * @dataProvider delimiterWrapperProvider
     * @param $pattern
     * @param $expected
     */
    public function it_wrapps_in_delimiter($pattern, $expected)
    {
        $this->assertEquals($expected, (string) new RegExp($pattern));
    }

    public function delimiterWrapperProvider()
    {
        return [
            ['^foo', '/^foo/'],
            ['/foo/', '/foo/'],
            ['#foo#', '#foo#'],
            ['~foo~', '~foo~'],
            ['+foo+', '+foo+'],
            ['afooa', '/afooa/'],
            [' foo ', '/ foo /'],
            ['😜', '/😜/'],
            ['@', '/@/'],
        ];
    }

    /** @test */
    public function it_checks_if_regexp_is_global()
    {
        $this->assertTrue((new RegExp('foo', 'gi'))->isGlobal());
        $this->assertTrue((new RegExp('foo', 'g'))->isGlobal());
        $this->assertFalse((new RegExp('foo', 'i'))->isGlobal());
    }
}
