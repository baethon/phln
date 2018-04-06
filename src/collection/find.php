<?php
declare(strict_types=1);

namespace phln\collection;

use function phln\fn\curryN;

const find = '\\phln\\collection\\find';
const 𝑓find = '\\phln\\collection\\𝑓find';

/**
 * Returns the first element of the list which matches the predicate,
 * or `null` if no element matches.
 *
 * @phlnSignature (a -> Boolean) -> [a] -> a
 * @phlnCategory collection
 * @param callable $predicate
 * @param array $list
 * @return \Closure|mixed
 * @example
 *      $xs = [['a' => 1], ['a' => 2], ['a' => 3]];
 *      \phln\collection\find(equals(['a' => 1]), $xs); // ['a' => 1]
 */
function find(callable $predicate = null, array $list = [])
{
    return curryN(2, 𝑓find, func_get_args());
}

function 𝑓find(callable $predicate, array $list)
{
    foreach ($list as $item) {
        if (true === $predicate($item)) {
            return $item;
        }
    }

    return null;
}
