<?php
declare(strict_types=1);

namespace phln\relation;

use const phln\object\values;
use function phln\fn\compose;
use function phln\fn\curryN;

const difference = '\\phln\\relation\\difference';
const 𝑓difference = '\\phln\\relation\\𝑓difference';

/**
 * Finds the set (i.e. no duplicates) of all elements in the first list not contained in the second list.
 *
 * @phlnSignature [*] -> [*] -> [*]
 * @phlnCategory relation
 * @param array $left
 * @param array $right
 * @return \Closure|array
 * @example
 *      \phln\relation\difference([1, 2, 3, 4], [3, 4, 5, 6]); // [1, 2]
 */
function difference(array $left = null, array $right = null)
{
    return curryN(2, 𝑓difference, func_get_args());
}

function 𝑓difference(array $left, array $right): array
{
    return compose([values, '\\array_diff'])($left, $right);
}
