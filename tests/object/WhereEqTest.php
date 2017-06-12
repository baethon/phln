<?php

use const phln\object\whereEq;

class WhereEqTest extends \Phln\Build\PhpUnit\TestCase
{
    public function getTestedFn(): string
    {
        return whereEq;
    }

    /** @test */
    public function it_validates_object()
    {
        $predicates = [
            'firstName' => 'Jon',
            'lastName' => 'Snow',
        ];

        $this->assertTrue($this->callFn($predicates, ['firstName' => 'Jon', 'lastName' => 'Snow']));
        $this->assertFalse($this->callFn($predicates, ['firstName' => 'Jon', 'lastName' => 'Stark']));
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
