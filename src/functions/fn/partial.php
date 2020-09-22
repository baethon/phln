<?php

declare(strict_types=1);

namespace Baethon\Phln;

const partial = 'Baethon\\Phln\\partial';

/**
 * Takes a function `f` and a list of arguments, and returns a function `g`.
 *
 * When applied, `g` returns the result of applying `f` to the arguments provided initially followed by the arguments provided to `g`.
 *
 * @param array<mixed> $args
 */
function partial(callable $fn, array $args): callable
{
    return function (...$otherArgs) use ($fn, $args) {
        return $fn(...$args, ...$otherArgs);
    };
}
