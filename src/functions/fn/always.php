<?php

declare(strict_types=1);

namespace Baethon\Phln;

const always = 'Baethon\\Phln\\always';

/**
 * Returns a function that always returns the given value.
 *
 * For non-primitives the value returned is a reference to the original value.
 *
 * @param mixed $value
 * @return callable
 */
function always($value): callable
{
    return function () use ($value) {
        return $value;
    };
}
