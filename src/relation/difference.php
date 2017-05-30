<?php
declare(strict_types=1);

namespace phln\relation;

use function phln\fn\compose;
use function phln\fn\curry;
use const phln\fn\nil;
use const phln\object\values;

const difference = '\\phln\\relation\\difference';
const 𝑓difference = '\\phln\\relation\\𝑓difference';

/**
 * Finds the set (i.e. no duplicates) of all elements in the first list not contained in the second list.
 *
 * @phlnSignature [*] -> [*] -> [*]
 * @phlnCategory relation
 * @param string|array $a
 * @param string|array $b
 * @return \Closure|array
 * @example
 *      \phln\relation\difference([1, 2, 3, 4], [3, 4, 5, 6]); // [1, 2]
 */
function difference($a = nil, $b = nil)
{
    return curry(𝑓difference, $a, $b);
}

function 𝑓difference(array $a, array $b): array
{
    return compose(values, '\\array_diff')($a, $b);
}
