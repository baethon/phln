<?php

use function phln\logic\allPass;

class AllPassTest extends \PHPUnit_Framework_TestCase
{
    /** @test */
    public function it_checks_if_all_predicates_pass()
    {
        $ace = \phln\relation\propEq('rank', 'A');
        $spades = \phln\relation\propEq('suit', '♠︎');
        $aceOfSpades = allPass([$ace, $spades]);

        $this->assertTrue($aceOfSpades(['rank' => 'A', 'suit' => '♠︎']));
        $this->assertFalse($aceOfSpades(['rank' => 'Q', 'suit' => '♠︎']));
    }

    /** @test */
    public function it_curries_to_highest_arity()
    {
        $p = allPass([\phln\relation\lte, \phln\relation\equals(1)]);

        $this->assertInstanceOf(\Closure::class, $p(1));
        $this->assertTrue($p(1)(2));
        $this->assertTrue($p(1, 2));
    }
}
