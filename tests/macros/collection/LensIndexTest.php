<?php

use Baethon\Phln\Phln as P;
use Baethon\Phln\Monad\Constant;

class LensIndexTest extends \PHPUnit\Framework\TestCase
{
    public function test_it_views_value()
    {
        $input = [1, 2, 3, 4, 5];
        $factory = function ($value) {
            return new Constant($value);
        };

        $this->assertEquals(new Constant(1), P::lensIndex(0, $factory, $input));
    }
}
