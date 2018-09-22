<?php
declare(strict_types=1);

namespace phln\collection;

use function phln\fn\curryN;

const all = '\\phln\\collection\\all';
const 𝑓all = '\\phln\\collection\\𝑓all';

/**
 * Returns `true` if all elements of array match the predicate, `false` otherwise.
 *
 * @phlnSignature (a -> Boolean) -> [a] -> Boolean
 * @phlnCategory collection
 * @param callable $predicate
 * @param array $list
 * @return \Closure|bool
 * @example
 *      $onlyTwos = \phln\collection\all(\phln\relation\equals(2));
 *      $onlyTwos([1, 2, 2]); // false
 */
function all(callable $predicate = null, array $list = [])
{
    return curryN(2, 𝑓all, func_get_args());
}

function 𝑓all(callable $predicate, array $list): bool
{
    foreach ($list as $value) {
        if (false === $predicate($value)) {
            return false;
        }
    }

    return true;
}
