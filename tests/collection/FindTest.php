<?php

use const phln\collection\find;

class FindTest extends \Phln\Build\PhpUnit\TestCase
{
    public function getTestedFn(): string
    {
        return find;
    }

    /** @test */
    public function it_finds_first_matching_element()
    {
        $p = function ($i) {
            return $i['id'] === 1;
        };

        $this->assertEquals(['id' => 1], $this->callFn($p, [['id' => 1], ['id' => 2]]));
        $this->assertNull($this->callFn($p, ['id' => 3]));
    }

    /** @test */
    public function it_is_curried()
    {
        $finder = $this->callFn(function ($i) {
            return $i['id'] === 1;
        });

        $this->assertEquals(['id' => 1], $finder([['id' => 2], ['id' => 1]]));
    }
}
