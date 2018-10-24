<?php

use Baethon\Phln\Phln as P;

class ViewTest extends \PHPUnit\Framework\TestCase
{
    public function test_it_views_value()
    {
        $lens = P::lensIndex(1);
        $input = [1, 2, 3, 4, 5];

        $this->assertEquals(2, P::view($lens, [1, 2, 3, 4, 5]));
    }
}
