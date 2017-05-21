<?php

use function phln\object\omit;
use const phln\object\omit;

class OmitTest extends \PHPUnit_Framework_TestCase
{
    /** @test */
    public function it_omits_given_keys()
    {
        $object = ['a' => 1, 'b' => 2, 'c' => 3];
        $this->assertEquals(['b' => 2], omit(['a', 'c'], $object));
    }

    /** @test */
    public function it_is_curried()
    {
        $object = ['a' => 1, 'b' => 2, 'c' => 3];
        $removeAC = omit(['a', 'c']);
        $this->assertEquals(['b' => 2], $removeAC($object));
    }
}
