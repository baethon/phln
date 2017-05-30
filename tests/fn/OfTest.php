<?php

use function phln\fn\of;

class OfTest extends \PHPUnit_Framework_TestCase
{
    /** @test */
    public function it_creates_array_of_value()
    {
        $this->assertEquals(['a'], of('a'));
    }
}
