<?php

use Baethon\Phln as p;

class LengthTest extends \PHPUnit\Framework\TestCase
{
    public function test_it_returns_length_of_array()
    {
        $this->assertEquals(3, p\length([1, 2, 3]));
    }

    public function test_it_returns_length_of_string()
    {
        $this->assertEquals(5, p\length('lorem'));
    }

    public function test_it_returns_length_of_countable()
    {
        $obj = new class () implements \Countable {
            public function count()
            {
                return 10;
            }
        };

        $this->assertEquals(10, p\length($obj));
    }
}
