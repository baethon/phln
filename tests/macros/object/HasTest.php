<?php

use Baethon\Phln\Phln as P;

class HasTest extends \PHPUnit\Framework\TestCase
{
    public function test_it_checks_for_array_properties()
    {
        $this->assertTrue(P::has('b', ['b' => null]));
        $this->assertFalse(P::has('a', ['b' => null]));
    }

    public function test_it_checks_for_object_properties()
    {
        $object = (object) ['b' => null];
        $this->assertTrue(P::has('b', $object));
        $this->assertFalse(P::has('a', $object));
    }
}
