<?php
declare(strict_types=1);

namespace phln\relation;

use function phln\fn\curry;
use const phln\fn\nil;

const gt = '\\phln\\relation\\gt';
const 𝑓gt = '\\phln\\relation\\𝑓gt';

/**
 * Returns `true` if the first argument is greater than the second; `false` otherwise.
 *
 * @phlnSignature Ord a => a -> a -> Boolean
 * @phlnCategory relation
 * @param mixed $a
 * @param mixed $b
 * @return \Closure|bool
 * @example
 *      \phln\relation\gt(2, 1); // true
 */
function gt($a = nil, $b = nil)
{
    return curry(𝑓gt, $a, $b);
}

function 𝑓gt($a, $b): bool
{
    return $a > $b;
}
