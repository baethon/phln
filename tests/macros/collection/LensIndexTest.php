<?php

use Baethon\Phln\Phln as P;
use Baethon\Phln\Monad\Constant;

class LensIndexTest extends \PHPUnit\Framework\TestCase
{
    public function test_it_views_value()
    {
        $input = [1, 2, 3, 4, 5];
        $lens = P::lensIndex(0);

        $this->assertEquals(1, P::view($lens, $input));
    }

    public function test_it_calls_fn_over_value()
    {
        $input = [1, 2, 3, 4, 5];
        $lens = P::lensIndex(0);

        $this->assertEquals([2, 2, 3, 4, 5], P::over($lens, P::inc(), $input));
    }

    public function test_it_sets_value()
    {
        $this->markTestIncomplete('Missing P::set() macro');
        $input = [1, 2, 3, 4, 5];
        $lens = P::lensIndex(0);

        $this->assertEquals([3, 2, 3, 4, 5], P::set($lens, 3, $input));
    }
}
