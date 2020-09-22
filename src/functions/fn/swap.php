<?php

declare(strict_types=1);

namespace Baethon\Phln;

const swap = 'Baethon\\Phln\\swap';

/**
 * Returns a new function much like the supplied one, except that the first two arguments' order is reversed.
 */
function swap(callable $fn): callable
{
    return function ($second, $first, ...$tail) use ($fn) {
        $arguments = array_merge([$first, $second], $tail);

        return $fn(...$arguments);
    };
}
