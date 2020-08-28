<?php

use Baethon\Phln as p;

class InitTest extends \PHPUnit\Framework\TestCase
{
    public function test_it_returns_list_without_last_element()
    {
        $this->assertEquals([1, 2], p\init([1, 2, 3]));
        $this->assertEquals([1], p\init([1, 2]));
        $this->assertEquals([], p\init([1]));
        $this->assertEquals([], p\init([]));
    }

    public function test_it_returns_string_without_last_character()
    {
        $this->assertEquals('lore', p\init('lorem'));
        $this->assertEquals('l', p\init('lo'));
        $this->assertEquals('', p\init('l'));
        $this->assertEquals('', p\init(''));
    }
}
