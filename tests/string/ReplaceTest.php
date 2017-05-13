<?php

use function phln\string\replace;

class ReplaceTest extends \PHPUnit_Framework_TestCase
{
    /** @test */
    public function it_replaces_first_matching_text()
    {
        $this->assertEquals('bar foo foo', replace('/foo/', 'bar', 'foo foo foo'));
    }

    /** @test */
    public function it_is_curried()
    {
        $replace = replace('/foo/', 'bar');
        $this->assertEquals('bar foo foo', $replace('foo foo foo'));
    }
}
