<?php

use Baethon\Phln\Monad\Constant;

class MonadConstantTest extends \PHPUnit\Framework\TestCase
{
    public function test_it_doesnt_map_value()
    {
        $fn = function ($value) {
            return "{$value}_foo";
        };

        $this->assertEquals(new Constant('test'), (new Constant('test'))->map($fn));
    }
}
