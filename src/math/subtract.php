<?php
declare(strict_types=1);

namespace phln\math;

use function phln\fn\curry;
use const phln\fn\nil;

const subtract = '\\phln\\math\\subtract';
const 𝑓subtract = '\\phln\\math\\𝑓subtract';

/**
 * Subtracts its second argument from its first argument.
 *
 * @phlnSignature Number a => a -> a -> a
 * @phlnCategory math
 * @param string $a
 * @param string $b
 * @return \Closure|mixed
 * @example
 *      $complementaryAngle = \phln\math\subtract(90);
 *      $complementaryAngle(30); //=> 60
 */
function subtract($a = nil, $b = nil)
{
    return curry(𝑓subtract, $a, $b);
}

function 𝑓subtract($a, $b)
{
    return $a - $b;
}
