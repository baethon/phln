<?php

use const phln\string\regexp;

class RegexpFnTest extends \Phln\Build\PhpUnit\TestCase
{
    public function getTestedFn(): string
    {
        return regexp;
    }

    /** @test  */
    public function it_works()
    {
        $this->assertEquals(new \phln\RegExp('/foo/', 'ig'), $this->callFn('/foo/ig'));
    }
}
