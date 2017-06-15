<?php
declare(strict_types=1);

namespace phln\collection;

use const phln\fn\nil;
use function phln\fn\curryN;

const all = '\\phln\\collection\\all';
const 𝑓all = '\\phln\\collection\\𝑓all';

/**
 * Returns `true` if all elements of array match the predicate, `false` otherwise.
 *
 * @phlnSignature (a -> Boolean) -> [a] -> Boolean
 * @phlnCategory collection
 * @param string $predicate
 * @param string $list
 * @return \Closure|bool
 * @example
 *      $onlyTwos = \phln\collection\all(\phln\relation\equals(2));
 *      $onlyTwos([1, 2, 2]); // false
 */
function all($predicate = nil, $list = nil)
{
    return curryN(2, 𝑓all, [$predicate, $list]);
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
