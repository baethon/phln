<?php
declare(strict_types=1);

namespace phln\relation;

use const phln\fn\nil;
use function phln\fn\curryN;

const min = '\\phln\\relation\\min';
const 𝑓min = '\\phln\\relation\\𝑓min';

/**
 * Returns the smaller of its two arguments.
 *
 * @phlnSignature a -> a -> a
 * @phlnCategory relation
 * @param string $left
 * @param string $right
 * @return \Closure|mixed
 * @example
 *      \phln\relation\min(1, -1); // -1
 */
function min($left = nil, $right = nil)
{
    return curryN(2, 𝑓min, [$left, $right]);
}

function 𝑓min($left, $right)
{
    return \min($left, $right);
}
