<?php
declare(strict_types=1);

namespace phln\math;

const inc = '\\phln\\math\\inc';

/**
 * Increment its argument
 *
 * @phlnSignature Int a => a -> a
 * @phlnCategory math
 * @param mixed $number
 * @return mixed
 */
function inc($number)
{
    return $number + 1;
}
