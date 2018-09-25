<?php
declare(strict_types=1);

namespace phln\math;

use function phln\fn\curryN;

const multiply = '\\phln\\math\\multiply';
const 𝑓multiply = '\\phln\\math\\𝑓multiply';

/**
 * Multiplies two numbers
 *
 * @phlnSignature Number a => a -> a -> a
 * @phlnCategory math
 * @param string $a
 * @param string $b
 * @return \Closure|mixed
 * @example
 *      $triple = \phln\math\multiply(3);
 *      $triple(7); // 21
 */
function multiply($a = null, $b = null)
{
    return curryN(2, 𝑓multiply, func_get_args());
}

function 𝑓multiply($a, $b)
{
    return $a * $b;
}