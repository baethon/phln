<?php

use function phln\fn\ap;

class ApTest extends \PHPUnit_Framework_TestCase
{
    /** @test */
    public function it_applies_function()
    {
        $functor = $this->createApplyFunctor(1);
        $applied = ap($functor, \phln\math\inc);
        $this->assertEquals($this->createApplyFunctor(2), $applied);
    }

    /** @test */
    public function it_can_be_curried()
    {
        $functor = $this->createApplyFunctor(1);
        $application = ap($functor);
        $applied = $application(\phln\math\dec);
        $this->assertEquals($this->createApplyFunctor(0), $applied);
    }

    private function createApplyFunctor($value)
    {
        return new class($value) {
            private $value;

            public function __construct($value)
            {
                $this->value = $value;
            }

            public function ap(callable $fn): self
            {
                return new static($fn($this->value));
            }
        };
    }
}
