<?php
declare(strict_types=1);

namespace phln\relation;

use const phln\fn\nil;
use function phln\fn\curryN;

const lt = '\\phln\\relation\\lt';
const 𝑓lt = '\\phln\\relation\\𝑓lt';

/**
 * Returns `true` if the first argument is less than the second; `false` otherwise.
 *
 * @phlnSignature Ord a => a -> a -> Boolean
 * @phlnCategory relation
 * @param mixed $a
 * @param mixed $b
 * @return \Closure|bool
 * @example
 *      \phln\relation\lt(1, 2); // true
 *      \phln\relation\lt(3, 2); // false
 *      \phln\relation\lt(2, 2); // false
 */
function lt($a = nil, $b = nil)
{
    return curryN(2, 𝑓lt, [$a, $b]);
}

function 𝑓lt($a, $b): bool
{
    return $a < $b;
}
