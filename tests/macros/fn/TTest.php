<?php

use Baethon\Phln\Phln as P;

class TTest extends \PHPUnit\Framework\TestCase
{
    public function test_it_returns_true()
    {
        $this->assertTrue(P::T()());
    }
}
