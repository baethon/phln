<?php
declare(strict_types=1);

namespace phln\logic;

use const phln\fn\nil;
use function phln\fn\curryN;

const ƛor = '\\phln\\logic\\ƛor';
const 𝑓or = '\\phln\\logic\\𝑓or';

/**
 * Returns `true` if one or both of its arguments are trueth-y. Returns `false` if both arguments are false-y.
 *
 * @phlnSignature a -> b -> Boolean
 * @phlnCategory logic
 * @param string $left
 * @param string $right
 * @return \Closure|mixed
 * @example
 *      \phln\logic\ƛor(true, false); // true
 */
function ƛor($left = nil, $right = nil)
{
    return curryN(2, 𝑓or, [$left, $right]);
}

function 𝑓or($left, $right): bool
{
    return $left || $right;
}
