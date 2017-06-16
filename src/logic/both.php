<?php
declare(strict_types=1);

namespace phln\logic;

use const phln\fn\nil;
use function phln\fn\curryN;

const both = '\\phln\\logic\\both';
const 𝑓both = '\\phln\\logic\\𝑓both';

/**
 * A function which calls the two provided functions and returns the `&&` of the results.
 *
 * @phlnSignature (*... -> Boolean) -> (*... -> Boolean) -> (*... -> Boolean)
 * @phlnCategory logic
 * @param string|callable $a
 * @param string|callable $b
 * @return \Closure
 * @example
 *      $gt10 = \phln\fn\partial(\phln\relation\gt, [\phln\fn\__, 10]);
 *      $lt20 = \phln\fn\partial(\phln\relation\lt, [\phln\fn\__, 20]);
 *      $f = \phln\logic\both($gt10, $lt20);
 *      $f(12); // true
 */
function both($a = nil, $b = nil)
{
    return curryN(2, 𝑓both, [$a, $b]);
}

function 𝑓both(callable $a, callable $b): \Closure
{
    return function (...$args) use ($a, $b) {
        return $a(...$args) && $b(...$args);
    };
}
