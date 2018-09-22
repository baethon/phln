<?php
declare(strict_types=1);

namespace phln\object;

const keys = '\\phln\\object\\keys';

/**
 * Returns a list containing the names of array keys.
 *
 * @phlnSignature {k: v} -> [k]
 * @phlnCategory object
 * @param array|object $object
 * @return array
 * @see \array_keys()
 * @see \get_object_vars()
 * @example
 *      \phln\object\keys(['a' => 1, 'b' => 1]); // ['a', 'b']
 */
function keys($object): array
{
    assertObject($object);

    $value = is_object($object)
        ? get_object_vars($object)
        : $object;

    return array_keys($value);
}
