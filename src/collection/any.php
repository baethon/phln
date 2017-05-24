<?php
declare(strict_types=1);

namespace phln\collection;

use function phln\fn\curry;
use const phln\fn\nil;

const any = '\\phln\\collection\\any';
const 𝑓any = '\\phln\\collection\\𝑓any';

/**
 * Returns `true` if at least one of array elements match the predicate, `false` otherwise.
 *
 * @phlnSignature (a -> Boolean) -> [a] -> Boolean
 * @phlnCategory collection
 * @param string $predicate
 * @param string $list
 * @return \Closure|bool
 * @example
 *      $hasTwos = \phln\collection\any(\phln\relation\equals(2));
 *      $hasTwos([1, 2, 3, 4]); // true
 */
function any($predicate = nil, $list = nil)
{
    return curry(𝑓any, $predicate, $list);
}

function 𝑓any(callable $predicate, array $list): bool
{
    foreach ($list as $value) {
        if (true === $predicate($value)) {
            return true;
        }
    }

    return false;
}
