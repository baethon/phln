<?php

declare(strict_types=1);

namespace Baethon\Phln;

const identity = 'Baethon\\Phln\\identity';

/**
 * A function that does nothing but return the parameter supplied to it. Good as a default or placeholder function.
 *
 * @param mixed $value
 *
 * @return mixed
 */
function identity($value)
{
    return $value;
}
