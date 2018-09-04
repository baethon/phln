<?php
declare(strict_types=1);

namespace Phln\Build\PhpUnit;

abstract class TestCase extends \PHPUnit\Framework\TestCase
{
    /**
     * @var string
     */
    protected $testedFnOverwrite = null;

    abstract public function getTestedFn(): string;

    /**
     * @param string $testedFnOverwrite
     */
    public function setTestedFnOverwrite(string $testedFnOverwrite)
    {
        $this->testedFnOverwrite = $testedFnOverwrite;
    }

    protected function callFn(...$args)
    {
        $fn = $this->getResolvedFn();

        if (false === defined($fn)) {
            $this->markTestSkipped("Function {$fn} is not defined");
        }

        return $fn(...$args);
    }

    public function toString()
    {
        $class = new \ReflectionClass($this);

        $buffer = sprintf(
            '%s::%s (using fn: %s)',
            $class->name,
            $this->getName(false),
            $this->getResolvedFn()
        );

        return $buffer . $this->getDataSetAsString();
    }

    protected function getResolvedFn(): string
    {
        return $this->testedFnOverwrite ?? $this->getTestedFn();
    }
}
