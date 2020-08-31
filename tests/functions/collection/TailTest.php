<?php

use Baethon\Phln as p;

class TailTest extends \PHPUnit\Framework\TestCase
{
    public function test_it_returns_tail_of_array()
    {
        $this->assertEquals([2, 3, 4], p\tail([1, 2, 3, 4]));
        $this->assertEquals([], p\tail([1]));
        $this->assertEquals([], p\tail([]));
    }

    public function test_it_returns_tail_of_string()
    {
        $this->assertEquals('orem', p\tail('lorem'));
        $this->assertEquals('', p\tail('l'));
        $this->assertEquals('', p\tail(''));
    }
}
