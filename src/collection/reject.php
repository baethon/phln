<?php
declare(strict_types=1);

namespace phln\collection;

use function phln\fn\negate;
use const phln\fn\nil;

/**
 * The negation of `filter`.
 *
 * @phlnSignature (a -> Boolean) -> [a] -> [a]
 * @phlnCategory collection
 * @param string|callable $predicate
 * @param string|array $list
 * @return \Closure|array
 * @example
 *      $isOdd = function ($i) {
 *          return $i % 2 === 1;
 *      };
 *      \phln\collection\reject($isOdd, [1, 2, 3, 4]); // [2, 4]
 */
function reject($predicate = nil, $list = nil)
{
    return filter(negate($predicate), $list);
}
