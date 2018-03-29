<?php
declare(strict_types=1);

namespace phln\relation;

use function phln\fn\curryN;

const equals = '\\phln\\relation\\equals';
const 𝑓equals = '\\phln\\relation\\𝑓equals';

/**
 * Returns `true` if its arguments are equivalent, `false` otherwise.
 *
 * @phlnSignature a -> b -> Boolean
 * @phlnCategory relation
 * @param mixed $a
 * @param mixed $b
 * @return \Closure|bool
 * @example
 *      \phln\relation\equals(1, 1); // true
 *      \phln\relation\equals(1, '1'); // false
 *      \phln\relation\equals(1, 2); // false
 */
function equals($a = null, $b = null)
{
    return curryN(2, 𝑓equals, [$a, $b]);
}

function 𝑓equals($a, $b): bool
{
    return $a === $b;
}
