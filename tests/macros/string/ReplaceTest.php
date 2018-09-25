<?php

use const phln\string\replace;

class ReplaceTest extends \Phln\Build\PhpUnit\TestCase
{
    public function getTestedFn(): string
    {
        return replace;
    }

    /** @test */
    public function it_replaces_first_matching_text()
    {
        $this->assertEquals('bar foo foo', $this->callFn('/foo/', 'bar', 'foo foo foo'));
    }

    /** @test */
    public function it_replaces_all_matches()
    {
        $this->assertEquals('bar bar bar', $this->callFn('/foo/g', 'bar', 'foo foo foo'));
    }

    /** @test */
    public function it_is_curried()
    {
        $replace = $this->callFn('/foo/', 'bar');
        $this->assertEquals('bar foo foo', $replace('foo foo foo'));
    }
}
