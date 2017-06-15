<?php
declare(strict_types=1);

namespace phln\relation;

use const phln\fn\nil;
use function phln\fn\curryN;

const max = '\\phln\\relation\\max';
const 𝑓max = '\\phln\\relation\\𝑓max';

/**
 * Returns the larger of its two arguments.
 *
 * @phlnSignature a -> a -> a
 * @phlnCategory relation
 * @param string $left
 * @param string $right
 * @return \Closure|mixed
 */
function max($left = nil, $right = nil)
{
    return curryN(2, 𝑓max, [$left, $right]);
}

function 𝑓max($left, $right)
{
    return \max($left, $right);
}
