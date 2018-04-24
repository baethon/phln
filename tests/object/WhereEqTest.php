<?php

use const phln\object\whereEq;

class WhereEqTest extends \Phln\Build\PhpUnit\TestCase
{
    public function getTestedFn(): string
    {
        return whereEq;
    }

    /**
     * @test
     * @dataProvider objectsProvider
     */
    public function it_validates_object($a, $b)
    {
        $predicates = [
            'firstName' => 'Jon',
            'lastName' => 'Snow',
        ];

        $this->assertTrue($this->callFn($predicates, $a));
        $this->assertFalse($this->callFn($predicates, $b));
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

    /** @test */
    public function it_is_curried()
    {
        $whereEq = $this->callFn([
            'firstName' => 'Jon',
            'lastName' => 'Snow',
        ]);

        $this->assertTrue($whereEq(['firstName' => 'Jon', 'lastName' => 'Snow']));
    }
}
