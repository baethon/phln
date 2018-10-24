<?php

use Baethon\Phln\Monad\Constant;
use Baethon\Phln\Testing\AssertLawsTrait;

class MonadConstantTest extends \PHPUnit\Framework\TestCase
{
    use AssertLawsTrait;

    public function test_laws()
    {
        $this->assertFunctor(new Constant('test'));
    }

    public function test_it_extracts_value()
    {
        $this->assertEquals('test', (new Constant('test'))->extract());
    }

    public function test_it_doesnt_map_value()
    {
        $fn = function ($value) {
            return "{$value}_foo";
        };

        $this->assertEquals(new Constant('test'), (new Constant('test'))->map($fn));
    }
}
