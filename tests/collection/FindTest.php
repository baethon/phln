<?php

use function phln\collection\find;

class FindTest extends \PHPUnit_Framework_TestCase
{
    /** @test */
    public function it_finds_first_matching_element()
    {
        $p = function ($i) {
            return $i['id'] === 1;
        };

        $this->assertEquals(['id' => 1], find($p, [['id' => 1], ['id' => 2]]));
        $this->assertNull(find($p, ['id' => 3]));
    }

    /** @test */
    public function it_is_curried()
    {
        $finder = find(function ($i) {
            return $i['id'] === 1;
        });

        $this->assertEquals(['id' => 1], $finder([['id' => 2], ['id' => 1]]));
    }
}
