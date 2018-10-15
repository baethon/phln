<?php

use Baethon\Phln\Phln as P;

class PropEqTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @dataProvider objectsProvider
     */
    public function test_it_checks_value($object)
    {
        $this->assertTrue(P::propEq('name', 'Jon', $object));
        $this->assertFalse(P::propEq('name', 'Arrya', $object));
    }

    public function objectsProvider()
    {
        return [
            [['name' => 'Jon']],
            [(object)['name' => 'Jon']],
        ];
    }
}
