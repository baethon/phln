<?php

use Baethon\Phln as p;

class MatchTest extends \PHPUnit\Framework\TestCase
{
    public function test_it_returns_first_match()
    {
        $this->assertEquals('ba', p\match('banana', '/([a-z]a)/'));
        $this->assertEquals('Lo', p\match('Lorem ipsum dolor', '/([a-z](o))/i'));
    }

    public function test_it_return_all_matches()
    {
        $this->assertEquals(['ba', 'na', 'na'], p\match('banana', '/([a-z]a)/g'));
        $this->assertEquals(['Lo', 'do', 'lo'], p\match('Lorem ipsum dolor', '/([a-z](?:o))/gi'));
    }

    public function test_it_returns_null_on_no_match()
    {
        $this->assertNull(p\match('b', '/a/'));
    }

    public function test_it_returns_empty_result_on_none_match()
    {
        $this->assertEquals([], p\match('b', '/a/g'));
    }

    public function test_it_returns_values_from_group()
    {
        $this->assertEquals('string', p\match('return string', '/return (\w+)/'));
        $this->assertEquals('string', p\match('return string return integer', '/return (\w+)/'));
    }

    public function test_it_returns_values_from_all_groups()
    {
        $this->assertEquals(['str', 'ing'], p\match('return string', '/return (str)(ing)/g'));
        $this->assertEquals(['str', 'ing', 'int', 'eger'], p\match('return string return integer', '/return (\w{3})(\w+)/g'));
    }
}
