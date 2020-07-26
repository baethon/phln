<?php

use baethon\phln as p;

class TTest extends \PHPUnit\Framework\TestCase
{
    public function test_it_returns_true()
    {
        $this->assertTrue(p\t());
    }

    public function test_it_has_an_alias()
    {
        $this->assertTrue(p\otherwise());
    }
}
