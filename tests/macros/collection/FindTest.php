<?php

use Baethon\Phln\Phln as P;

class FindTest extends \PHPUnit\Framework\TestCase
{
    public function test_it_finds_first_matching_element()
    {
        $p = function ($i) {
            return $i['id'] === 1;
        };

        $this->assertEquals(['id' => 1], P::find($p, [['id' => 1], ['id' => 2]]));
        $this->assertNull(P::find($p, ['id' => 3]));
    }

    public function test_it_is_curried()
    {
        $finder = P::find(function ($i) {
            return $i['id'] === 1;
        });

        $this->assertEquals(['id' => 1], $finder([['id' => 2], ['id' => 1]]));
    }
}
