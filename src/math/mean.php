<?php
declare(strict_types=1);

namespace phln\math;

use function phln\fn\curry;
use const phln\fn\nil;

const mean = '\\phln\\math\\mean';
const 𝑓mean = '\\phln\\math\\𝑓mean';

/**
 * Returns the mean of the given list of numbers.
 *
 * @phlnSignature Number a => [a] -> a
 * @phlnCategory math
 * @param string|array $numbers
 * @example
 *      \phln\math\mean([2, 7, 9]) // 6
 * @return \Closure|mixed
 */
function mean($numbers = nil)
{
    return curry(𝑓mean, $numbers);
}

function 𝑓mean(array $numbers)
{
    return array_sum($numbers) / count($numbers);
}
