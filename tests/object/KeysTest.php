<?php

use function phln\object\keys;
use const phln\object\keys;

class KeysTest extends \PHPUnit_Framework_TestCase
{
    /** @test */
    public function it_returns_keys_from_array()
    {
        $this->assertEquals(['a', 'b'], keys(['a' => 1, 'b' => 1]));
    }

    /** @test */
    public function it_can_be_used_as_callback()
    {
        $this->assertEquals(['a', 'b'], call_user_func(keys, ['a' => 1, 'b' => 1]));
    }
}
