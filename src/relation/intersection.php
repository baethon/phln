<?php
declare(strict_types=1);

namespace phln\relation;

use function phln\fn\compose;
use function phln\fn\curry;
use const phln\fn\nil;
use const phln\object\values;

const intersection = '\\phln\\relation\\intersection';
const 𝑓intersection = '\\phln\\relation\\𝑓intersection';

/**
 * Combines two lists into a set composed of those elements common to both lists.
 *
 * @phlnSignature [*] -> [*] -> [*]
 * @phlnCategory relation
 * @param string $a
 * @param string $b
 * @return \Closure|mixed
 * @example
 *      \phln\relation\intersection([1, 2, 3, 4], [6, 4, 5]); // [4]
 */
function intersection($a = nil, $b = nil)
{
    return curry(𝑓intersection, $a, $b);
}

function 𝑓intersection(array $a, array $b): array
{
    return compose(values, '\\array_intersect')($a, $b);
}
