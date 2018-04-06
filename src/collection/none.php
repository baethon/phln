<?php
declare(strict_types=1);

namespace phln\collection;

use function phln\fn\curryN;
use function phln\fn\negate;

const none = '\\phln\\collection\\none';
const 𝑓none = '\\phln\\collection\\𝑓none';

/**
 * Returns `true` if no elements of the list match the predicate, `false` otherwise.
 *
 * @phlnSignature (a -> Boolean) -> [a] -> Boolean
 * @phlnCategory collection
 * @param callable $predicate
 * @param array $list
 * @return \Closure|mixed
 * @example
 *      $isEven = function ($i) {
 *          return $i % 2 === 0;
 *      };
 *
 *      \phln\collection\none($isEven, [1, 3, 5]); // true
 *      \phln\collection\none($isEven, [1, 3, 5, 6]); // false
 */
function none(callable $predicate = null, array $list = [])
{
    return curryN(2, 𝑓none, func_get_args());
}

function 𝑓none(callable $predicate, array $list): bool
{
    return all(negate($predicate), $list);
}
