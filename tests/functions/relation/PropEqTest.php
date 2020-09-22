<?php

use Baethon\Phln as p;

class PropEqTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @dataProvider objectsProvider
     */
    public function test_it_checks_value($object)
    {
        $this->assertTrue(p\prop_eq($object, 'name', 'Jon'));
        $this->assertFalse(p\prop_eq($object, 'name', 'Arrya'));
    }

    public function objectsProvider()
    {
        return [
            [['name' => 'Jon']],
            [(object)['name' => 'Jon']],
        ];
    }
}
