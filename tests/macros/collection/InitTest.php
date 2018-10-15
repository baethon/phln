<?php

use Baethon\Phln\Phln as P;

class InitTest extends \PHPUnit\Framework\TestCase
{
    public function test_it_returns_list_without_last_element()
    {
        $this->assertEquals([1, 2], P::init([1, 2, 3]));
        $this->assertEquals([1], P::init([1, 2]));
        $this->assertEquals([], P::init([1]));
        $this->assertEquals([], P::init([]));
    }

    public function test_it_returns_string_without_last_character()
    {
        $this->assertEquals('lore', P::init('lorem'));
        $this->assertEquals('l', P::init('lo'));
        $this->assertEquals('', P::init('l'));
        $this->assertEquals('', P::init(''));
    }
}
