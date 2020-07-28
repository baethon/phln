<?php

declare(strict_types=1);

namespace Baethon\Phln;

const partial_right = 'Baethon\\Phln\\partial_right';

/**
 * Takes a function `f` and a list of arguments, and returns a function `g`. When applied, `g` returns the result of applying `f` to the arguments provided initially followed by the arguments provided to `g`.
 *
 * @param callable $fn
 * @param array $args
 * @return callable
 */
function partial_right (callable $fn, array $args): callable {
    return function (...$innerArgs) use ($fn, $args) {
        return $fn(...array_merge($innerArgs, $args));
    };
}
