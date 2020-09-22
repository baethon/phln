<?php

use Baethon\Phln\RegExp;
use Baethon\Phln as p;

class RegexpTest extends \PHPUnit\Framework\TestCase
{
    public function test_it_works()
    {
        $this->assertEquals(new RegExp('/foo/', 'ig'), p\regexp('/foo/ig'));
    }
}
