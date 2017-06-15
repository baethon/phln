<?php
declare(strict_types=1);

namespace phln\math;

const mean = '\\phln\\math\\mean';

/**
 * Returns the mean of the given list of numbers.
 *
 * @phlnSignature Number a => [a] -> a
 * @phlnCategory math
 * @param array $numbers
 * @example
 *      \phln\math\mean([2, 7, 9]) // 6
 * @return \Closure|mixed
 */
function mean(array $numbers)
{
    return array_sum($numbers) / count($numbers);
}
