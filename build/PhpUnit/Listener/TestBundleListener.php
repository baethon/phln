<?php
declare(strict_types=1);

namespace Phln\Build\PhpUnit\Listener;

use Exception;
use Phln\Build\PhpUnit\TestCase;
use PHPUnit\Framework\AssertionFailedError;
use PHPUnit\Framework\Test;
use PHPUnit\Framework\TestListener;
use PHPUnit\Framework\TestSuite;
use PHPUnit\Framework\Warning;

class TestBundleListener implements TestListener
{
    public function addError(Test $test, Exception $e, $time)
    {
        // void
    }

    public function addFailure(Test $test, AssertionFailedError $e, $time)
    {
        // void
    }

    public function addIncompleteTest(Test $test, Exception $e, $time)
    {
        // void
    }

    public function addRiskyTest(Test $test, Exception $e, $time)
    {
        // void
    }

    public function addSkippedTest(Test $test, Exception $e, $time)
    {
        // void
    }

    public function addWarning(Test $test, Warning $e, $time)
    {
        // void
    }

    /**
     * Makes clone of all test cases extending Phln\Build\PhpUnit\TestCase
     * and adds them to the test suite.
     *
     * Clonned test cases are set to use static methods from Phln bundle.
     *
     * @param TestSuite $suite
     */
    public function startTestSuite(TestSuite $suite)
    {
        $tests = array_filter(
            $suite->tests(),
            function ($testCase) {
                return $testCase instanceof TestCase;
            }
        );

        foreach ($tests as $testCase) {
            /** @var TestCase $testCase */
            $clone = clone $testCase;
            $clone->setTestedFnOverwrite($this->fnToBundleMethod($testCase->getTestedFn()));

            $suite->addTest($clone);
        }
    }

    private function fnToBundleMethod(string $fnName): string
    {
        $name = class_basename($fnName);
        return "\phln\Phln::{$name}";
    }

    public function endTestSuite(TestSuite $suite)
    {
        // void
    }

    public function startTest(Test $test)
    {
        // void
    }

    public function endTest(Test $test, $time)
    {
        // void
    }
}
