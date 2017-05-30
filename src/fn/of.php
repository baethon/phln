<?php
declare(strict_types=1);

namespace phln\fn;

use function phln\fn\curry;
use const phln\fn\nil;

const of = '\\phln\\fn\\of';

/**
 * Returns a singleton array containing the value provided.
 *
 * @phlnSignature a -> [a]
 * @phlnCategory function
 * @param mixed $value
 * @return array
 * @example
 *      \phln\fn\of(null); // [null]
 *      \phln\fn\of('a'); // ['a']
 */
function of($value): array
{
    return [$value];
}
