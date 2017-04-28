<?php
declare(strict_types=1);

namespace phln\math;

use function phln\fn\curry;
use const phln\fn\nil;

const negate = '\\phln\\math\\𝑓negate';

/**
 * Negates a number
 *
 * @phlnSignature Number a => a -> a
 * @phlnCategory math
 * @param string $number
 * @return \Closure|mixed
 * @example
 *      \phln\math\negate(-2); // 2
 */
function negate($number = nil)
{
    return curry(negate, $number);
}

function 𝑓negate($number)
{
    return $number * -1;
}
