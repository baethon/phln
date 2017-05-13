<?php

use function phln\string\replaceAll;
use const phln\string\replaceAll;

class ReplaceAllTest extends \PHPUnit_Framework_TestCase
{
    /** @test */
    public function it_replaces_all_matches()
    {
        $this->assertEquals('bar bar bar', replaceAll('/foo/', 'bar', 'foo foo foo'));
    }

    /** @test */
    public function it_is_curried()
    {
        $replace = replaceAll('/foo/', 'bar');
        $this->assertEquals('bar bar bar', $replace('foo foo foo'));
    }
}
