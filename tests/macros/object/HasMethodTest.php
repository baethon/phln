<?php

use Baethon\Phln\Phln as P;

class HasMethodTest extends \PHPUnit\Framework\TestCase
{
    public function test_it_checks_if_method_exists()
    {
        $dummy = new class () {
            public function publ()
            {
            }

            private function priv()
            {
            }

            protected function prot()
            {
            }
        };

        $this->assertTrue(P::hasMethod('publ', $dummy));
        $this->assertFalse(P::hasMethod('priv', $dummy));
        $this->assertFalse(P::hasMethod('prot', $dummy));
    }

    /**
     * @dataProvider nonObjectsProvider
     */
    public function test_it_checks_non_objects($object)
    {
        $this->assertFalse(P::hasMethod('foo', $object));
    }

    public function nonObjectsProvider()
    {
        return [
            ['foo'],
            [1],
        ];
    }
}
