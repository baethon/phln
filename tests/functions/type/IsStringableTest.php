<?php

use Baethon\Phln as p;

class IsStringableTest extends \PHPUnit\Framework\TestCase
{
    public function test_strings()
    {
        $this->assertTrue(p\is_stringable("foo"));
    }

    public function test_stringable_objects()
    {
        $this->assertTrue(p\is_stringable(new class {
            public function __toString()
            {
                return "";
            }
        }));
    }

    public function test_other_types()
    {
        $this->assertFalse(p\is_stringable(123));
        $this->assertFalse(p\is_stringable(null));
        $this->assertFalse(p\is_stringable(true));
    }
}
