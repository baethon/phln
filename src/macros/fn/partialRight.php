<?php
declare(strict_types=1);

use Baethon\Phln\Phln as P;

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
 *      $f = P::partialRight($hello, ['Jon', 'Stark']);
 *      $f('Hello'); // 'Hello, Jon Stark'
 */
P::curried('partialRight', 2, function (callable $fn, array $args): \Closure {
    return function (...$innerArgs) use ($fn, $args) {
        return $fn(...array_merge($innerArgs, $args));
    };
});
