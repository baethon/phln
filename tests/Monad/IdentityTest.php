<?php

use Baethon\Phln\Monad\Identity;

class MonadIdentityTest extends \PHPUnit\Framework\TestCase
{
    public function test_it_extracts_value()
    {
        $this->assertEquals('test', Identity::of('test')->extract());
    }

    public function test_it_maps_value()
    {
        $fn = function ($string) {
            return "{$string}_foo";
        };

        $this->assertEquals(Identity::of('test_foo'), Identity::of('test')->map($fn));
    }
}
