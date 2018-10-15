<?php

use Baethon\Phln\Phln as P;

class FTest extends \PHPUnit\Framework\TestCase
{
    public function test_it_returns_false()
    {
        $this->assertFalse(P::F());
        $this->assertFalse(call_user_func(P::class.'::F'));
    }
}
