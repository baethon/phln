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
}
