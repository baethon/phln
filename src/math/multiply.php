<?php
declare(strict_types=1);

namespace phln\math;

use function phln\fn\curry;
use const phln\fn\nil;

const multiply = '\\phln\\math\\𝑓multiply';

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
function multiply($a = nil, $b = nil)
{
    return curry(multiply, $a, $b);
}

function 𝑓multiply($a, $b)
{
    return $a * $b;
}
