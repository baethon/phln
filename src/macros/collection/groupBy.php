<?php
declare(strict_types=1);

namespace phln\collection;

use function phln\fn\curryN;

const groupBy = '\\phln\\collection\\groupBy';
const 𝑓groupBy = '\\phln\\collection\\𝑓groupBy';

/**
 * Splits a list into sub-lists stored in an object, based on the result of calling a String-returning function on each element, and grouping the results according to values returned.
 *
 * @phlnSignature (a -> String) -> [a] -> { String: [a] }
 * @phlnCategory collection
 * @param callable $fn
 * @param array $collection
 * @return \Closure|array
 * @example
 *      \phln\collection\groupBy(
 *          function (int $i) {
 *              return ($i % 2 === 0)
 *                  ? 'even'
 *                  : 'odd';
 *          },
 *          [1, 2, 3, 4]
 *      ); // ['odd' => [1, 3], 'even' => [2, 4]]
 */
function groupBy(callable $fn = null, array $collection = null)
{
    return curryN(2, 𝑓groupBy, func_get_args());
}

function 𝑓groupBy(callable $fn, array $collection): array
{
    return reduce(
        function ($carry, $item) use ($fn) {
            $key = $fn($item);
            $innerList = array_key_exists($key, $carry)
                ? $carry[$key]
                : [];

            $carry[$key] = array_merge($innerList, [$item]);

            return $carry;
        },
        [],
        $collection
    );
}
