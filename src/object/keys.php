<?php
declare(strict_types=1);

namespace phln\object;

use function phln\fn\curry;
use const phln\fn\nil;

const keys = '\\phln\\object\\keys';

/**
 * Returns a list containing the names of array keys.
 *
 * @phlnSignature {k: v} -> [k]
 * @phlnCategory object
 * @param array $object
 * @return array
 * @see \array_keys()
 * @example
 *      \phln\object\keys(['a' => 1, 'b' => 1]); // ['a', 'b']
 */
function keys(array $object): array
{
    return array_keys($object);
}
