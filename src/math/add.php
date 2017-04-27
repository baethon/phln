<?php
declare(strict_types=1);

namespace phln\math;

use function phln\fn\curry;
use const phln\fn\nil;

const add = '\\phln\\math\\𝑓add';

/**
 * Add two values
 *
 * @phlnSignature Number a => a -> a -> a
 * @phlnCategory math
 * @param mixed $a
 * @param mixed $b
 * @return \Closure|mixed
 */
function add($a = nil, $b = nil)
{
    return curry(add, $a, $b);
}

function 𝑓add($a, $b)
{
    return $a + $b;
}
