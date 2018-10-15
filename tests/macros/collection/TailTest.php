<?php

use Baethon\Phln\Phln as P;

class TailTest extends \PHPUnit\Framework\TestCase
{
    public function test_it_returns_tail_of_array()
    {
        $this->assertEquals([2, 3, 4], P::tail([1, 2, 3, 4]));
        $this->assertEquals([], P::tail([1]));
        $this->assertEquals([], P::tail([]));
    }

    public function test_it_returns_tail_of_string()
    {
        $this->assertEquals('orem', P::tail('lorem'));
        $this->assertEquals('', P::tail('l'));
        $this->assertEquals('', P::tail(''));
    }
}
