<?php
declare(strict_types=1);

namespace Phln\Build\PhpUnit\Listener;

use Exception;
use Phln\Build\PhpUnit\TestCase;
use PHPUnit_Framework_AssertionFailedError;
use PHPUnit_Framework_Test;
use PHPUnit_Framework_TestListener;
use PHPUnit_Framework_TestSuite;

class TestBundleListener implements PHPUnit_Framework_TestListener
{
    public function addError(PHPUnit_Framework_Test $test, Exception $e, $time)
    {
        // void
    }

    public function addFailure(PHPUnit_Framework_Test $test, PHPUnit_Framework_AssertionFailedError $e, $time)
    {
        // void
    }

    public function addIncompleteTest(PHPUnit_Framework_Test $test, Exception $e, $time)
    {
        // void
    }

    public function addRiskyTest(PHPUnit_Framework_Test $test, Exception $e, $time)
    {
        // void
    }

    public function addSkippedTest(PHPUnit_Framework_Test $test, Exception $e, $time)
    {
        // void
    }

    /**
     * Makes clone of all test cases extending Phln\Build\PhpUnit\TestCase
     * and adds them to the test suite.
     *
     * Clonned test cases are set to use static methods from Phln bundle.
     *
     * @param PHPUnit_Framework_TestSuite $suite
     */
    public function startTestSuite(PHPUnit_Framework_TestSuite $suite)
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

    public function endTestSuite(PHPUnit_Framework_TestSuite $suite)
    {
        // void
    }

    public function startTest(PHPUnit_Framework_Test $test)
    {
        // void
    }

    public function endTest(PHPUnit_Framework_Test $test, $time)
    {
        // void
    }
}
