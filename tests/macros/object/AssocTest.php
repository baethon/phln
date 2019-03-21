<?php

use Baethon\Phln\Phln as P;

class AssocTest extends \PHPUnit\Framework\TestCase
{
    public function test_it_sets_key_in_array()
    {
        $input = ['a' => 1];
        $result = P::assoc('b', 2, $input);

        $this->assertEquals(['a' => 1, 'b' => 2], $result);
        $this->assertNotSame($input, $result);
    }

    public function test_it_sets_key_in_object()
    {
        $input = (object)['a' => 1];
        $result = P::assoc('b', 2, $input);

        $this->assertEquals((object)['a' => 1, 'b' => 2], $result);
        $this->assertNotSame($input, $result);
    }
}
