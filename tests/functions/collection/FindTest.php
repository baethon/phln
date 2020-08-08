<?php

use Baethon\Phln as p;

class FindTest extends \PHPUnit\Framework\TestCase
{
    public function test_it_finds_first_matching_element()
    {
        $p = function ($i) {
            return $i['id'] === 1;
        };

        $this->assertEquals(['id' => 1], p\find([['id' => 1], ['id' => 2]], $p));
        $this->assertNull(p\find([['id' => 3]], $p));
    }
}
