<?php
declare(strict_types=1);

namespace phln\fn;

use function phln\fn\curryN;

const unapply = '\\phln\\fn\\unapply';
const 𝑓unapply = '\\phln\\fn\\𝑓unapply';

/**
 * Takes a function `fn`, which takes a single array argument, and returns a function which:
 * * takes any number of positional arguments;
 * * passes these arguments to `fn` as an array and returns the result
 *
 * In other words, `\phln\fn\unapply` derives a variadic function from a function which takes an array. `\phln\fn\unapply` is the inverse of `\phln\fn\apply`.
 *
 * @phlnSignature ([*...] -> a) -> (*... -> a)
 * @phlnCategory function
 * @param string|callable $fn
 * @param array ...$args
 * @return \Closure|mixed
 * @example
 *      \phln\fn\unapply('\\json_encode')(1, 2, 3); // [1,2,3]
 */
function unapply($fn = null, ...$args)
{
    return curryN(2, 𝑓unapply, array_merge([$fn], $args));
}

function 𝑓unapply(callable $fn, ...$args)
{
    return $fn($args);
}
