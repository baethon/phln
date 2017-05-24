<?php
declare(strict_types=1);

namespace phln\collection;

use function phln\fn\curry;
use const phln\fn\nil;
use function phln\relation\equals;

const contains = '\\phln\\collection\\contains';
const 𝑓contains = '\\phln\\collection\\𝑓contains';

/**
 * Returns `true` if the specified value is equal, `phln\relation\equals` terms,
 * to at least one element of the given list; `false` otherwise.
 *
 * @phlnSignature a -> [a] -> Boolean
 * @phlnCategory collection
 * @param string $value
 * @param string $list
 * @return \Closure|mixed
 * @example
 *      \phln\collection\contains(1, [1, 2, 3]); // true
 */
function contains($value = nil, $list = nil)
{
    return curry(𝑓contains, $value, $list);
}

function 𝑓contains($value, array $list): bool
{
    return any(equals($value), $list);
}
