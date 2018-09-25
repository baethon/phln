<?php

use function phln\collection\any;
use const phln\collection\any;

class AnyTest extends \Phln\Build\PhpUnit\TestCase
{
    public function getTestedFn(): string
    {
        return any;
    }

    /** @test */
    public function it_checks_if_any_element_of_array_match_predicate()
    {
        $predicate = function ($i) {
            return $i > 4;
        };

        $this->assertTrue($this->callFn($predicate, [1, 2, 4, 5]));
        $this->assertFalse($this->callFn($predicate, [1, 2]));
    }

    /** @test */
    public function it_is_curried()
    {
        $f = $this->callFn(function ($i) {
            return $i > 2;
        });

        $this->assertTrue($f([1, 2, 3]));
    }
}
