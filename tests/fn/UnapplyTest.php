<?php

use const phln\fn\unapply;

class UnapplyTest extends \Phln\Build\PhpUnit\TestCase
{
    public function getTestedFn(): string
    {
        return unapply;
    }

    /** @test */
    public function it_passes_variadics_as_array_argument()
    {
        $args = [1, 2, 3];
        $result = $this->callFn('\\json_encode', ...$args);
        $this->assertEquals(json_encode($args), $result);
    }

    /** @test */
    public function it_is_curried()
    {
        $args = [1, 2, 3];
        $f = $this->callFn('\\json_encode');
        $this->assertEquals(json_encode($args), $f(...$args));
    }
}
