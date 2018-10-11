<?php

use Baethon\Phln\RegExp;
use Baethon\Phln\Phln as P;

class RegexpFnTest extends \PHPUnit\Framework\TestCase
{
    public function test_it_works()
    {
        $this->assertEquals(new RegExp('/foo/', 'ig'), P::regexp('/foo/ig'));
    }
}
