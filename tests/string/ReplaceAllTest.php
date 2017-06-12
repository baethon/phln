<?php

use const phln\string\replaceAll;

class ReplaceAllTest extends \Phln\Build\PhpUnit\TestCase
{
    public function getTestedFn(): string
    {
        return replaceAll;
    }

    /** @test */
    public function it_replaces_all_matches()
    {
        $this->assertEquals('bar bar bar', $this->callFn('/foo/', 'bar', 'foo foo foo'));
    }

    /** @test */
    public function it_is_curried()
    {
        $replace = $this->callFn('/foo/', 'bar');
        $this->assertEquals('bar bar bar', $replace('foo foo foo'));
    }
}
