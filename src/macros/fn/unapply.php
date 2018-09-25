<?php
declare(strict_types=1);

use Baethon\Phln\Phln as P;

/**
 * Takes a function `fn`, which takes a single array argument, and returns a function which:
 * * takes any number of positional arguments;
 * * passes these arguments to `fn` as an array and returns the result
 *
 * In other words, `P::unapply` derives a variadic function from a function which takes an array. `P::unapply` is the inverse of `P::apply`.
 *
 * @phlnSignature ([*...] -> a) -> (*... -> a)
 * @phlnCategory function
 * @param string|callable $fn
 * @param array ...$args
 * @return \Closure|mixed
 * @example
 *      P::unapply('\\json_encode')(1, 2, 3); // [1,2,3]
 */
P::curried('unapply', 2, function (callable $fn, ...$args) {
    return $fn($args);
});
