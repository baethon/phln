<?php
declare(strict_types=1);

namespace phln\math;

use function phln\fn\curry;
use const phln\fn\nil;

const sum = '\\phln\\math\\𝑓sum';

/**
 * Adds together all the elements of a list.
 *
 * @phlnSignature [Number] -> Number
 * @phlnCategory math
 * @param string $numbers
 * @return \Closure|mixed
 * @example
 *      \phln\math\sum([1, 2, 3, 4]); // 10
 */
function sum($numbers = nil)
{
    return curry(sum, $numbers);
}

function 𝑓sum(array $numbers)
{
    return array_sum($numbers);
}
