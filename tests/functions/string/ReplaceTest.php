<?php

use Baethon\Phln as p;

class ReplaceTest extends \PHPUnit\Framework\TestCase
{
    public function test_it_replaces_first_matching_text()
    {
        $this->assertEquals('bar foo foo', p\replace('foo foo foo', '/foo/', 'bar'));
    }

    public function test_it_replaces_all_matches()
    {
        $this->assertEquals('bar bar bar', p\replace('foo foo foo', '/foo/g', 'bar'));
    }
}
