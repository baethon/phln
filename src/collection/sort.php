<?php
declare(strict_types=1);

namespace phln\collection;

use function phln\fn\curry;
use const phln\fn\nil;

const sort = '\\phln\\collection\\𝑓sort';

/**
 * Returns a copy of the list, sorted according to the comparator function, which should accept two values at a time and return a negative number if the first value is smaller, a positive number if it's larger, and zero if they are equal.
 *
 * @phlnSignature ((a, a) -> Number) -> [a] -> [a]
 * @phlnCategory collection
 * @param string|callable $comparator
 * @param string|array $list
 * @return \Closure|array
 * @see \usort()
 * @example
 *      $diff = function ($a, $b) {
 *          return $a - $b;
 *      };
 *
 *      \phln\collection\sort($diff, [3, 2, 1]); // [1, 2, 3]
 */
function sort($comparator = nil, $list = nil)
{
    return curry(sort, $comparator, $list);
}

function 𝑓sort(callable $comparator, array $list): array
{
    usort($list, $comparator);
    return $list;
}
