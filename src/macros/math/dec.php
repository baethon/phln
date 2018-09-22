<?php
declare(strict_types=1);

namespace phln\math;

const dec = '\\phln\\math\\dec';

/**
 * Decrement its argument
 *
 * @phlnSignature Int a => a -> a
 * @phlnCategory math
 * @param mixed $number
 * @return mixed
 */
function dec($number)
{
    return $number - 1;
}
