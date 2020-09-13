<?php

use Baethon\Phln as p;

class HasTest extends \PHPUnit\Framework\TestCase
{
    public function test_it_checks_for_array_properties()
    {
        $this->assertTrue(p\has(['b' => null], 'b'));
        $this->assertFalse(p\has(['b' => null], 'a'));
    }

    public function test_it_checks_for_object_properties()
    {
        $object = (object) ['b' => null];
        $this->assertTrue(p\has($object, 'b'));
        $this->assertFalse(p\has($object, 'a'));
    }
}
