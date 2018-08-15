<?php

use const phln\fn\partialRight;

class PartialRightTest extends \Phln\Build\PhpUnit\TestCase
{
    public function getTestedFn(): string
    {
        return partialRight;
    }

    /** @test  */
    public function it_applies_right_side_of_arguments()
    {
        $fn = function ($a, $b, $c) {
            return sprintf('%s, %s - %s', $a, $b, $c);
        };

        $f = $this->callFn($fn, ['a', 'z']);

        $this->assertEquals('Hello, a - z', $f('Hello'));
    }

    /** @test */
    public function it_allows_to_pass_multiple_arguments()
    {
        $fn = function ($a, $b, $c) {
            return sprintf('%s, %s - %s', $a, $b, $c);
        };

        $f = $this->callFn($fn, ['z']);

        $this->assertEquals('Hello, a - z', $f('Hello', 'a'));
    }
}
