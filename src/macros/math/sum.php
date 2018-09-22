<?php
declare(strict_types=1);

namespace phln\math;

const sum = '\\phln\\math\\sum';

/**
 * Adds together all the elements of a list.
 *
 * @phlnSignature [Number] -> Number
 * @phlnCategory math
 * @param array $numbers
 * @return mixed
 * @example
 *      \phln\math\sum([1, 2, 3, 4]); // 10
 */
function sum(array $numbers)
{
    return array_sum($numbers);
}
