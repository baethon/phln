<?php

use function phln\collection\collapse;
use const phln\collection\collapse;

class CollapseTest extends \Phln\Build\PhpUnit\TestCase
{
    public function getTestedFn(): string
    {
        return collapse;
    }

    /** @test */
    public function it_flattens_array_by_one_level()
    {
        $this->assertEquals([1, 2, [3]], $this->callFn([[1], [2], [[3]]]));
        $this->assertEquals([1, 2, [3]], $this->callFn([[1, 2], [[3]]]));
    }
}
