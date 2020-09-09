<?php

use Baethon\Phln as p;

class AssocTest extends \PHPUnit\Framework\TestCase
{
    public function test_it_sets_key_in_array()
    {
        $input = ['a' => 1];
        $result = p\assoc($input, 'b', 2);

        $this->assertEquals(['a' => 1, 'b' => 2], $result);
        $this->assertNotSame($input, $result);
    }

    public function test_it_sets_key_in_object()
    {
        $input = (object)['a' => 1];
        $result = p\assoc($input, 'b', 2);

        $this->assertEquals((object)['a' => 1, 'b' => 2], $result);
        $this->assertNotSame($input, $result);
    }
}
