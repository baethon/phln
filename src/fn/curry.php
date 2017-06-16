<?php
declare(strict_types=1);

namespace phln\fn;

const curry = '\\phln\\fn\\curry';

const nil = '_phln_nil_argument';

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
function curry(callable $fn, array $args = [])
{
    return curryN(arity($fn), $fn, $args);
}
