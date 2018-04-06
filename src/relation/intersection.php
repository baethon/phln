<?php
declare(strict_types=1);

namespace phln\relation;

use const phln\object\values;
use function phln\fn\compose;
use function phln\fn\curryN;

const intersection = '\\phln\\relation\\intersection';
const 𝑓intersection = '\\phln\\relation\\𝑓intersection';

/**
 * Combines two lists into a set composed of those elements common to both lists.
 *
 * @phlnSignature [*] -> [*] -> [*]
 * @phlnCategory relation
 * @param array $left
 * @param array $right
 * @return \Closure|mixed
 * @example
 *      \phln\relation\intersection([1, 2, 3, 4], [6, 4, 5]); // [4]
 */
function intersection(array $left = [], array $right = [])
{
    return curryN(2, 𝑓intersection, func_get_args());
}

function 𝑓intersection(array $left, array $right): array
{
    return compose([values, '\\array_intersect'])($left, $right);
}
