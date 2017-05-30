<?php
declare(strict_types=1);

namespace phln\relation;

use function phln\fn\curry;
use const phln\fn\nil;

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
    return curry(𝑓lt, $a, $b);
}

function 𝑓lt($a, $b): bool
{
    return $a < $b;
}
