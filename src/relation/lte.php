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
 * @param mixed $left
 * @param mixed $right
 * @return \Closure|mixed
 * @example
 *      \phln\relation\lte(1, 2); // true
 */
function lte($left = null, $right = null)
{
    return curryN(2, 𝑓lte, func_get_args());
}

function 𝑓lte($left, $right): bool
{
    return $left <= $right;
}
