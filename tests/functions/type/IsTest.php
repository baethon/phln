<?php

use Baethon\Phln as p;

class IsTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @param $type
     * @param $value
     * @dataProvider isDataProvider
     */
    public function test_it_tests_given_type($type, $value)
    {
        $this->assertTrue(p\is($value, $type));
    }

    public function test_it_tests_object_type()
    {
        $this->assertFalse(p\is(new stdClass(), 'array'));
    }

    public function isDataProvider()
    {
        return [
            ['bool', true],
            ['boolean', true],
            ['integer', 1],
            ['double', 1.1],
            ['float', 1.1],
            ['string', '1.1'],
            ['array', ['1.1']],
            ['object', new \stdClass()],
            [\stdClass::class, new \stdClass()],
            ['null', null],
            ['callable', '\\strrev'],
            ['function', '\\strrev'],
            ['callable', function () {}],
        ];
    }
}
