<?php

use Baethon\Phln\Phln as P;

class PhlnTest extends \PHPUnit\Framework\TestCase
{
    public function test_it_is_macroable()
    {
        P::macro('foo', function () {
            return 'foo';
        });

        $this->assertEquals('foo', P::foo());
    }
}
