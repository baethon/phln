<?php
declare(strict_types=1);

namespace phln\object;

/**
 * Check if value is valid object.
 *
 * Value is considered as object if its an array
 * or class instance.
 *
 * @param mixed $value
 * @return void
 * @throws \Exception
 */
function assertObject($value)
{
    $type = gettype($value);

    assert(
        is_object($value) || is_array($value),
        new \Exception("[{$type}] is not a valid object")
    );
}
