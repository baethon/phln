<?php
declare(strict_types=1);

namespace phln\math;

use function phln\fn\curry;
use const phln\fn\nil;

const inc = '\\phln\\math\\inc';
const 𝑓inc = '\\phln\\math\\𝑓inc';

/**
 * Increment its argument
 *
 * @phlnSignature Int a => a -> a
 * @phlnCategory math
 * @param string|integer $number
 * @return \Closure|integer
 */
function inc($number = nil)
{
    return curry(𝑓inc, $number);
}

function 𝑓inc(int $number): int
{
    return $number + 1;
}
