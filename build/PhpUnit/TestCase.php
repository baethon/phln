<?php
declare(strict_types=1);

namespace Phln\Build\PhpUnit;

abstract class TestCase extends \PHPUnit\Framework\TestCase
{
    abstract public function getTestedFn(): string;

    protected function callFn(...$args)
    {
        $fn = $this->getResolvedFn();

        return call_user_func_array($fn, $args);
    }

    protected function getMacroName(string $fnName): string
    {
        $tmp = explode('\\', $fnName);

        return array_pop($tmp);
    }

    protected function getResolvedFn(): string
    {
        $fn = $this->getTestedFn();

        return sprintf('phln\Phln::%s', $this->getMacroName($fn));
    }
}
