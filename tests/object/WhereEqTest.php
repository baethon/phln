<?php

use function phln\object\whereEq;

class WhereEqTest extends \PHPUnit_Framework_TestCase
{
    /** @test */
    public function it_validates_object()
    {
        $predicates = [
            'firstName' => 'Jon',
            'lastName' => 'Snow',
        ];

        $this->assertTrue(whereEq($predicates, ['firstName' => 'Jon', 'lastName' => 'Snow']));
        $this->assertFalse(whereEq($predicates, ['firstName' => 'Jon', 'lastName' => 'Stark']));
    }

    /** @test */
    public function it_is_curried()
    {
        $whereEq = whereEq([
            'firstName' => 'Jon',
            'lastName' => 'Snow',
        ]);

        $this->assertTrue($whereEq(['firstName' => 'Jon', 'lastName' => 'Snow']));
    }
}
