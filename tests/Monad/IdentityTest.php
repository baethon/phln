<?php

use Baethon\Phln\Monad\Identity;
use Baethon\Phln\Testing\AssertLawsTrait;

class MonadIdentityTest extends \PHPUnit\Framework\TestCase
{
    use AssertLawsTrait;

    public function test_laws()
    {
        $v = Identity::of('test');
        $this->assertFunctor($v);
        $this->assertApply($v);
        $this->assertChain($v);
        $this->assertApplicative($v);
        $this->assertSetoid($v);
    }

    public function test_it_extracts_value()
    {
        $this->assertEquals('test', Identity::of('test')->extract());
    }
}
