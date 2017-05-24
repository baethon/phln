<?php
declare(strict_types=1);

namespace phln\math;

use function phln\fn\curry;
use const phln\fn\nil;

const product = '\\phln\\math\\product';
const 𝑓product = '\\phln\\math\\𝑓product';

/**
 * Multiplies together all the elements of a list.
 *
 * @phlnSignature Number a => [a] -> a
 * @phlnCategory math
 * @param string $numbers
 * @return \Closure|mixed
 * @example
 *      \phln\math\product([2, 4, 6, 8, 100, 1]); // 38400
 */
function product($numbers = nil)
{
    return curry(𝑓product, $numbers);
}

function 𝑓product(array $numbers)
{
    return array_product($numbers);
}
