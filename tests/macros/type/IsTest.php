<?php

use Baethon\Phln\Phln as P;

class IsTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @param $type
     * @param $value
     * @dataProvider isDataProvider
     */
    public function test_it_tests_given_type($type, $value)
    {
        $this->assertTrue(P::is($type, $value));
    }

    public function test_it_tests_object_type()
    {
        $this->assertFalse(P::is('array', new stdClass()));
    }

    public function test_it_is_curried()
    {
        $isString = P::is('string');
        $this->assertTrue($isString('asd'));
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
