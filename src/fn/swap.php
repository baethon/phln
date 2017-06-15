<?php
declare(strict_types=1);

namespace phln\fn;

const swap = '\\phln\\fn\\swap';

/**
 * Returns a new function much like the supplied one, except that the first two arguments' order is reversed.
 *
 * @phlnSignature (a -> b -> c -> ... -> z) -> (b -> a -> c -> ... -> z)
 * @phlnCategory function
 * @param callable $f
 * @return \Closure
 * @example
 *      $serialize = function ($a, $b) {
 *          return "a:{$a},b:{$b}";
 *      };
 *      \phln\fn\swap($serialize)(2, 1); // 'a:1,b:2'
 */
function swap(callable $f): \Closure
{
    return function ($second, $first, ...$tail) use ($f) {
        $arguments = array_merge([$first, $second], $tail);
        return $f(...$arguments);
    };
}

