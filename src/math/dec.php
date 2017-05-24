<?php
declare(strict_types=1);

namespace phln\math;

use function phln\fn\curry;
use const phln\fn\nil;

const dec = '\\phln\\math\\dec';
const 𝑓dec = '\\phln\\math\\𝑓dec';

/**
 * Decrement its argument
 *
 * @phlnSignature Int a => a -> a
 * @phlnCategory math
 * @param string|integer $number
 * @return \Closure|integer
 */
function dec($number = nil)
{
    return curry(𝑓dec, $number);
}

function 𝑓dec(int $number): int
{
    return $number - 1;
}
