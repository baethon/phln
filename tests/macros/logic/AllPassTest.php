<?php

use Baethon\Phln\Phln as P;

class AllPassTest extends \PHPUnit\Framework\TestCase
{
    public function test_it_checks_if_all_predicates_pass()
    {
        $ace = function ($item) {
            return $item['rank'] === 'A';
        };
        $spades = function ($item) {
            return $item['suit'] === '♠︎';
        };

        $aceOfSpades = P::allPass([$ace, $spades]);

        $this->assertTrue($aceOfSpades(['rank' => 'A', 'suit' => '♠︎']));
        $this->assertFalse($aceOfSpades(['rank' => 'Q', 'suit' => '♠︎']));
    }

    public function test_it_curries_to_highest_arity()
    {
        $p = P::allPass([P::lte(), P::equals(1)]);

        $this->assertTrue(is_callable($p(1)));
        $this->assertTrue($p(1)(2));
        $this->assertTrue($p(1, 2));
    }
}
