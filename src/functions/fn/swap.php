<?php

declare(strict_types=1);

namespace baethon\phln;

const swap = 'baethon\\phln\\swap';

/**
 * Returns a new function much like the supplied one, except that the first two arguments' order is reversed.
 *
 * @param callable $fn
 * @return callable
 */
function swap (callable $fn): callable {
    return function ($second, $first, ...$tail) use ($fn) {
        $arguments = array_merge([$first, $second], $tail);
        return $fn(...$arguments);
    };
}
