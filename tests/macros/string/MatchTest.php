<?php

use Baethon\Phln\Phln as P;

class MatchTest extends \PHPUnit\Framework\TestCase
{
    public function test_it_returns_first_match()
    {
        $this->assertEquals('ba', P::match('/([a-z]a)/', 'banana'));
        $this->assertEquals('Lo', P::match('/([a-z](o))/i', 'Lorem ipsum dolor'));
    }

    public function test_it_return_all_matches()
    {
        $this->assertEquals(['ba', 'na', 'na'], P::match('/([a-z]a)/g', 'banana'));
        $this->assertEquals(['Lo', 'do', 'lo'], P::match('/([a-z](?:o))/gi', 'Lorem ipsum dolor'));
    }

    public function test_it_returns_null_on_no_match()
    {
        $this->assertNull(P::match('/a/', 'b'));
    }

    public function test_it_returns_empty_result_on_none_match()
    {
        $this->assertEquals([], P::match('/a/g', 'b'));
    }

    public function test_it_returns_values_from_group()
    {
        $this->assertEquals('string', P::match('/return (\w+)/', 'return string'));
        $this->assertEquals('string', P::match('/return (\w+)/', 'return string return integer'));
    }

    public function test_it_returns_values_from_all_groups()
    {
        $this->assertEquals(['str', 'ing'], P::match('/return (str)(ing)/g', 'return string'));
        $this->assertEquals(['str', 'ing', 'int', 'eger'], P::match('/return (\w{3})(\w+)/g', 'return string return integer'));
    }
}
