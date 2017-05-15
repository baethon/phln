<?php
declare(strict_types=1);

namespace phln\relation;

use function phln\fn\curry;
use const phln\fn\nil;

const equals = '\\phln\\relation\\𝑓equals';

/**
 * Returns `true` if its arguments are equivalent, `false` otherwise.
 *
 * @phlnSignature a -> b -> Boolean
 * @phlnCategory relation
 * @param string $a
 * @param string $b
 * @return \Closure|bool
 * @example
 *      \phln\relation\equals(1, 1); // true
 *      \phln\relation\equals(1, '1'); // false
 *      \phln\relation\equals(1, 2); // false
 */
function equals($a = nil, $b = nil)
{
    return curry(equals, $a, $b);
}

function 𝑓equals($a, $b): bool
{
    return $a === $b;
}
