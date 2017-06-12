<?php

use const phln\collection\none;

class NoneTest extends \Phln\Build\PhpUnit\TestCase
{
    public function getTestedFn(): string
    {
        return none;
    }

    /** @test */
    public function it_checks_if_none_elements_match_predicament()
    {
        $p = function ($i) {
            return $i > 2;
        };

        $this->assertTrue($this->callFn($p, [1, 2]));
        $this->assertFalse($this->callFn($p, [1, 2, 3]));
    }

    /** @test */
    public function it_is_curried()
    {
        $p = function ($i) {
            return $i > 2;
        };
        $g = $this->callFn($p);
        $this->assertTrue($g([1, 2]));
    }
}
