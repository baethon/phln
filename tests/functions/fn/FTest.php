<?php

use baethon\phln as p;

class FTest extends \PHPUnit\Framework\TestCase
{
    public function test_it_returns_false()
    {
        $this->assertFalse(p\f());
    }
}
