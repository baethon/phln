<?php

declare(strict_types=1);

namespace baethon\phln;

const partial = 'baethon\\phln\\partial';

/**
 * Takes a function `f` and a list of arguments, and returns a function `g`.
 *
 * When applied, `g` returns the result of applying `f` to the arguments provided initially followed by the arguments provided to `g`.
 *
 * @param callable $fn
 * @param array $args
 * @return callable
 */
function partial (callable $fn, array $args): callable {
    return function (...$otherArgs) use ($fn, $args) {
        return $fn(...$args, ...$otherArgs);
    };
}
