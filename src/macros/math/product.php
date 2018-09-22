<?php
declare(strict_types=1);

namespace phln\math;

const product = '\\phln\\math\\product';

/**
 * Multiplies together all the elements of a list.
 *
 * @phlnSignature Number a => [a] -> a
 * @phlnCategory math
 * @param array $numbers
 * @return mixed
 * @example
 *      \phln\math\product([2, 4, 6, 8, 100, 1]); // 38400
 */
function product(array $numbers)
{
    return array_product($numbers);
}
