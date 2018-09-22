<?php
declare(strict_types=1);

namespace phln\math;

const median = '\\phln\\math\\median';
const 𝑓median = '\\phln\\math\\𝑓median';

/**
 * Returns the median of the given list of numbers.
 *
 * @phlnSignature Number a => [a] -> a
 * @phlnCategory math
 * @param string|array $numbers
 * @return mixed
 * @example
 *      \\phln\\math\\median([7, 2, 9]) // 7
 *      \\phln\\math\\median([7, 2, 10, 9]) // 8
 */
function median(array $numbers)
{
    sort($numbers, SORT_NUMERIC);
    $middle = count($numbers) / 2;
    $even = (0 === $middle % 2);

    $offsets = $even ? [$middle - 1, 2] : [(int)floor($middle), 1];
    $slice = array_slice($numbers, ...$offsets);

    return mean($slice);
}
