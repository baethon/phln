<?php
declare(strict_types=1);

namespace phln\relation;

use function phln\fn\curryN;

const lte = '\\phln\\relation\\lte';
const 𝑓lte = '\\phln\\relation\\𝑓lte';

/**
 * Returns `true` if the first argument is less than or equal to the second; `false` otherwise.
 *
 * @phlnSignature Ord a => a -> a -> Boolean
 * @phlnCategory relation
 * @param string $a
 * @param string $b
 * @return \Closure|mixed
 * @example
 *      \phln\relation\lte(1, 2); // true
 */
function lte($a = null, $b = null)
{
    return curryN(2, 𝑓lte, [$a, $b]);
}

function 𝑓lte($a, $b): bool
{
    return $a <= $b;
}
