<?php
declare(strict_types=1);

namespace phln\collection;

use function phln\fn\curry;
use const phln\fn\nil;

const range = '\\phln\\collection\\𝑓range';

/**
 * Returns a list of numbers from `from` (inclusive) to `to` (exclusive).
 *
 * @phlnSignature Integer a => a -> a -> [a]
 * @phlnCategory collection
 * @param string|int $start
 * @param string|int $end
 * @return \Closure|array
 * @example
 *      \phln\collection\range(0, 3); // [0, 1, 2]
 */
function range($start = nil, $end = nil)
{
    return curry(range, $start, $end);
}

function 𝑓range(int $from, int $to): array
{
    if ($from === $to) {
        return [];
    }

    return ($from < $to) ? \range($from, $to - 1) : \range($from, $to + 1);
}