<?php
declare(strict_types=1);

namespace phln\math;

use const phln\fn\nil;
use function phln\fn\curryN;

const modulo = '\\phln\\math\\modulo';
const 𝑓modulo = '\\phln\\math\\𝑓modulo';

/**
 * Divides the first parameter by the second and returns the remainder.
 *
 * @phlnSignature Number a => a -> a -> a
 * @phlnCategory math
 * @param string $a
 * @param string $b
 * @return \Closure|mixed
 * @example
 *      \\phln\\math\\modulo(1, 2) // 1
 */
function modulo($a = nil, $b = nil)
{
    return curryN(2, 𝑓modulo, [$a, $b]);
}

function 𝑓modulo($a, $b)
{
    return $a % $b;
}
