<?php
declare(strict_types=1);

namespace phln\collection;

use function phln\fn\curryN;

const sort = '\\phln\\collection\\sort';
const 𝑓sort = '\\phln\\collection\\𝑓sort';

/**
 * Returns a copy of the list, sorted according to the comparator function, which should accept two values at a time and return a negative number if the first value is smaller, a positive number if it's larger, and zero if they are equal.
 *
 * @phlnSignature ((a, a) -> Number) -> [a] -> [a]
 * @phlnCategory collection
 * @param callable $comparator
 * @param array $list
 * @return \Closure|array
 * @see \usort()
 * @example
 *      $diff = function ($a, $b) {
 *          return $a - $b;
 *      };
 *
 *      \phln\collection\sort($diff, [3, 2, 1]); // [1, 2, 3]
 */
function sort(callable $comparator = null, array $list = [])
{
    return curryN(2, 𝑓sort, func_get_args());
}

function 𝑓sort(callable $comparator, array $list): array
{
    usort($list, $comparator);
    return $list;
}
