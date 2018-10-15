<?php

use Baethon\Phln\Phln as P;

class ReplaceTest extends \PHPUnit\Framework\TestCase
{
    public function test_it_replaces_first_matching_text()
    {
        $this->assertEquals('bar foo foo', P::replace('/foo/', 'bar', 'foo foo foo'));
    }

    public function test_it_replaces_all_matches()
    {
        $this->assertEquals('bar bar bar', P::replace('/foo/g', 'bar', 'foo foo foo'));
    }
}
