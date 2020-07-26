<?php

declare(strict_types=1);

namespace baethon\phln;

const unapply = 'baethon\\phln\\unapply';

/**
 * Takes a function `fn`, which takes a single array argument, and returns a function which:
 * * takes any number of positional arguments;
 * * passes these arguments to `fn` as an array and returns the result
 *
 * In other words, `P::unapply` derives a variadic function from a function which takes an array. `P::unapply` is the inverse of `P::apply`.
 *
 * @param callable $fn
 * @param mixed ...$args
 * @return mixed
 */
function unapply (callable $fn, ...$args) {
    return $fn($args);
}
