<?php

use Baethon\Phln\Phln as P;

class WhereEqTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @dataProvider objectsProvider
     */
    public function test_it_validates_object($a, $b)
    {
        $predicates = [
            'firstName' => 'Jon',
            'lastName' => 'Snow',
        ];

        $this->assertTrue(P::whereEq($predicates, $a));
        $this->assertFalse(P::whereEq($predicates, $b));
    }

    public function objectsProvider()
    {
        return [
            [
                ['firstName' => 'Jon', 'lastName' => 'Snow'],
                ['firstName' => 'Jon', 'lastName' => 'Stark'],
            ],
            [
                (object) ['firstName' => 'Jon', 'lastName' => 'Snow'],
                (object) ['firstName' => 'Jon', 'lastName' => 'Stark'],
            ],
        ];
    }
}
