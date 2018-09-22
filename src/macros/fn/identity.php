<?php
declare(strict_types=1);

namespace phln\fn;

const identity = '\\phln\\fn\\identity';

/**
 * A function that does nothing but return the parameter supplied to it. Good as a default or placeholder function.
 *
 * @phlnSignature a -> a
 * @phlnCategory function
 * @param $value
 * @return mixed
 * @example
 *      \phln\fn\identity(1) === 1; // 'true'
 */
function identity($value)
{
    return $value;
}

