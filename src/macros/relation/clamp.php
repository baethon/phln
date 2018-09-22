<?php
declare(strict_types=1);

namespace phln\relation;

use const phln\fn\nil;
use function phln\fn\curryN;
use function phln\fn\pipe;

const clamp = '\\phln\\relation\\clamp';
const 𝑓clamp = '\\phln\\relation\\𝑓clamp';

/**
 * Restricts a number to be within a range.
 *
 * @phlnSignature Number a => a -> a -> a -> a
 * @phlnCategory relation
 * @param mixed $min
 * @param mixed $max
 * @param mixed $value
 * @return \Closure|mixed
 * @example
 *      \phln\relation\clamp(-1, 1, -100); // -1
 *      \phln\relation\clamp(-1, 1, 100); // 1
 *      \phln\relation\clamp(-1, 1, 0); // 0
 */
function clamp($min = null, $max = null, $value = null)
{
    return curryN(3, 𝑓clamp, func_get_args());
}

function 𝑓clamp($min, $max, $value)
{
    $f = pipe([
        min($max),
        max($min),
    ]);

    return $f($value);
}
