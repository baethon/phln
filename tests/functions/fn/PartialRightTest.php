<?php

use Baethon\Phln as p;

class PartialRightTest extends \PHPUnit\Framework\TestCase
{
    public function test_it_applies_right_side_of_arguments()
    {
        $fn = function ($a, $b, $c) {
            return sprintf('%s, %s - %s', $a, $b, $c);
        };

        $f = p\partial_right($fn, ['a', 'z']);

        $this->assertEquals('Hello, a - z', $f('Hello'));
    }

    public function test_it_allows_to_pass_multiple_arguments()
    {
        $fn = function ($a, $b, $c) {
            return sprintf('%s, %s - %s', $a, $b, $c);
        };

        $f = p\partial_right($fn, ['z']);

        $this->assertEquals('Hello, a - z', $f('Hello', 'a'));
    }
}
