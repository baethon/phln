<?php
declare(strict_types=1);

namespace phln\relation;

use const phln\fn\nil;
use function phln\fn\curryN;

const gte = '\\phln\\relation\\gte';
const 𝑓gte = '\\phln\\relation\\𝑓gte';

/**
 * Returns `true` if the first argument is greater than or equal to the second; `false` otherwise.
 *
 * @phlnSignature Ord a => a -> a -> Boolean
 * @phlnCategory relation
 * @param string $a
 * @param string $b
 * @return \Closure|mixed
 * @example
 *      \phln\relation\gte(2, 1); // true
 *      \phln\relation\gte(2, 2); // true
 *      \phln\relation\gte(2, 3); // false
 */
function gte($a = nil, $b = nil)
{
    return curryN(2, 𝑓gte, [$a, $b]);
}

function 𝑓gte($a, $b): bool
{
    return $a >= $b;
}
