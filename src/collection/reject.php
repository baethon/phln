<?php
declare(strict_types=1);

namespace phln\collection;

use function phln\fn\curryN;
use function phln\fn\negate;

const reject = '\\phln\\collection\\reject';
const 𝑓reject = '\\phln\\collection\\𝑓reject';

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
function reject($predicate = null, $list = null)
{
    return curryN(2, 𝑓reject, [$predicate, $list]);
}

function 𝑓reject(callable $predicate, array $list): array
{
    return 𝑓filter(negate($predicate), $list);
}
