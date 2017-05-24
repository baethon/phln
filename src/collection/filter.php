<?php
declare(strict_types=1);

namespace phln\collection;

use function phln\fn\curry;
use const phln\fn\nil;

const filter = '\\phln\\collection\\filter';
const 𝑓filter = '\\phln\\collection\\𝑓filter';

/**
 * Filters elements of an array using a callback function
 *
 * @phlnSignature (a -> Boolean) -> [a] -> Boolean
 * @phlnCategory collection
 * @param string $predicate
 * @param string $list
 * @return \Closure|mixed
 * @example
 *      \phln\collection\filter(equals(1), [1, 2, 3]); // [1]
 */
function filter($predicate = nil, $list = nil)
{
    return curry(𝑓filter, $predicate, $list);
}

function 𝑓filter(callable $predicate, array $list): array
{
    return array_values(array_filter($list, $predicate));
}
