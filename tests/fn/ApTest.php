<?php

use const phln\fn\ap;

class ApTest extends \Phln\Build\PhpUnit\TestCase
{
    public function getTestedFn(): string
    {
        return ap;
    }

    /** @test */
    public function it_applies_function()
    {
        $functor = $this->createApplyFunctor(1);
        $applied = $this->callFn($functor, \phln\math\inc);
        $this->assertEquals($this->createApplyFunctor(2), $applied);
    }

    /** @test */
    public function it_can_be_curried()
    {
        $functor = $this->createApplyFunctor(1);
        $application = $this->callFn($functor);
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
