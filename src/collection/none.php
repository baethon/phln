<?php
declare(strict_types=1);

namespace phln\collection;

use function phln\fn\curry;
use function phln\fn\negate;
use const phln\fn\nil;

const none = '\\phln\\collection\\𝑓none';

/**
 * Returns `true` if no elements of the list match the predicate, `false` otherwise.
 *
 * @phlnSignature (a -> Boolean) -> [a] -> Boolean
 * @phlnCategory collection
 * @param string $predicate
 * @param string $list
 * @return \Closure|mixed
 * @example
 *      $isEven = function ($i) {
 *          return $i % 2 === 0;
 *      };
 *
 *      \phln\collection\none($isEven, [1, 3, 5]); // true
 *      \phln\collection\none($isEven, [1, 3, 5, 6]); // false
 */
function none($predicate = nil, $list = nil)
{
    return curry(none, $predicate, $list);
}

function 𝑓none(callable $predicate, array $list): bool
{
    return all(negate($predicate), $list);
}
