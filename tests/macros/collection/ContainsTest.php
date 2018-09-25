<?php

use function phln\collection\contains;
use const phln\collection\contains;

class ContainsTest extends \Phln\Build\PhpUnit\TestCase
{
    public function getTestedFn(): string
    {
        return contains;
    }

    /** @test */
    public function it_checks_if_value_is_in_array()
    {
        $this->assertTrue($this->callFn(1, [1, 2, 3]));
        $this->assertFalse($this->callFn('1', [1, 2, 3]));
    }

    /** @test */
    public function it_checks_if_string_contains_value()
    {
        $this->assertTrue($this->callFn('foo', 'barfooasd'));
        $this->assertFalse($this->callFn('foo', 'bar'));
    }

    /** @test */
    public function it_returns_false_for_non_supported_types()
    {
        $this->assertFalse($this->callFn('foo', 1));
    }

    /** @test */
    public function it_is_curried()
    {
        $p = $this->callFn(1);
        $this->assertTrue($p([1, 2, 3]));
    }
}
