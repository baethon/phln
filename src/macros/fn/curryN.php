<?php
declare(strict_types=1);

use Baethon\Phln\Phln as P;

/**
 * Returns a curried equivalent of the provided function, with the specified arity.
 *
 * Curried function doesn't require providing arguments one at a time.
 * If `f` is a ternary function and `g` is `\phln\fn\curryN(3, f)`, the following are equivalent.
 *      * g(1)(2)(3)
 *      * g(1)(2, 3)
 *      * g(1, 2)(3)
 *      * g(1, 2, 3)
 *
 * @phlnSignature Number -> (* → a) → (* → a)
 * @phlnCategory function
 * @param int $n
 * @param callable $fn
 * @param array $args
 * @return \Closure|mixed
 */
P::macro('curryN', function (int $n, callable $fn, array $args = []) {
    return (count($args) >= $n)
        ? $fn(...$args)
        : function (...$innerArgs) use ($n, $fn, $args) {
            return P::curryN($n, $fn, array_merge($args, $innerArgs));
        };
});
