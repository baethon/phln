<?php
declare(strict_types=1);

namespace phln\fn;

use function phln\fn\curryN;

const partialRight = '\\phln\\fn\\partialRight';
const 𝑓partialRight = '\\phln\\fn\\𝑓partialRight';

/**
 * Takes a function `f` and a list of arguments, and returns a function `g`. When applied, `g` returns the result of applying `f` to the arguments provided initially followed by the arguments provided to `g`.
 *
 * @phlnSignature ((a, b, c, d, ..., n) -> x) -> [d, ..., n] -> ((a, b, c) -> x)
 * @phlnCategory function
 * @param callable $fn
 * @param array $args
 * @return \Closure
 * @example
 *      $hello = function ($salutations, $name, $lastname) {
 *          return "{$salutations}, {$name} {$lastname}";
 *      };
 *
 *      $f = \phln\fn\partialRight($hello, ['Jon', 'Stark']);
 *      $f('Hello'); // 'Hello, Jon Stark'
 */
function partialRight(callable $fn = null, array $args = null): \Closure
{
    return curryN(2, 𝑓partialRight, func_get_args());
}

function 𝑓partialRight(callable $fn, array $args): \Closure
{
    return function (...$innerArgs) use ($fn, $args) {
        return $fn(...array_merge($innerArgs, $args));
    };
}
