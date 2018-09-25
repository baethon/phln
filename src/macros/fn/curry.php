<?php
declare(strict_types=1);

use Baethon\Phln\Phln as P;

/**
 * Returns a curried equivalent of the provided function.
 *
 * Curried function doesn't require providing arguments one at a time.
 * If `f` is a ternary function and `g` is `\phln\fn\curry(f)`, the following are equivalent.
 *      * g(1)(2)(3)
 *      * g(1)(2, 3)
 *      * g(1, 2)(3)
 *      * g(1, 2, 3)
 *
 * @phlnSignature (* → a) → (* → a)
 * @phlnCategory function
 * @param callable $fn
 * @param array $args
 * @return \Closure|mixed
 */
P::macro('curry', function (callable $fn, array $args = []) {
    return P::curryN(P::arity($fn), $fn, $args);
});
