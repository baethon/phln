<?php

use function phln\type\is;
use const phln\type\is;

class IsTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @param $type
     * @param $value
     * @test
     * @dataProvider isDataProvider
     */
    public function it_tests_given_type($type, $value)
    {
        $this->assertTrue(is($type, $value));
    }

    /** @test */
    public function it_is_curried()
    {
        $isString = is('string');
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
        ];
    }
}
