<?php
declare(strict_types=1);

use Baethon\Phln\Phln as P;

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
 *      P::swap($serialize)(2, 1); // 'a:1,b:2'
 */
P::macro('swap', function (callable $f): \Closure {
    return function ($second, $first, ...$tail) use ($f) {
        $arguments = array_merge([$first, $second], $tail);
        return $f(...$arguments);
    };
});
