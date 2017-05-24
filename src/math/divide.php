<?php
declare(strict_types=1);

namespace phln\math;

use function phln\fn\curry;
use const phln\fn\nil;

const divide = '\\phln\\math\\divide';
const 𝑓divide = '\\phln\\math\\𝑓divide';

/**
 * Divide numbers. Equivalent of `a / b`
 *
 * @phlnSignature Number a => a -> a -> a
 * @phlnCategory math
 * @param mixed $a
 * @param mixed $b
 * @return \Closure|mixed
 */
function divide($a = nil, $b = nil)
{
    return curry(𝑓divide, $a, $b);
}

function 𝑓divide($a, $b)
{
    return $a / $b;
}
