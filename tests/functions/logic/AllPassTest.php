<?php

use Baethon\Phln as p;

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

        $aceOfSpades = p\_(p\all_pass, [$ace, $spades]);

        $this->assertTrue($aceOfSpades(['rank' => 'A', 'suit' => '♠︎']));
        $this->assertFalse($aceOfSpades(['rank' => 'Q', 'suit' => '♠︎']));
    }
}
