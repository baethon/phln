<?php
declare(strict_types=1);

namespace phln\collection;

use function phln\fn\curry;
use function phln\fn\curryN;
use const phln\fn\nil;
use function phln\object\values;

const map = '\\phln\\collection\\map';

/**
 * Applies the callback to the elements of the given arrays
 *
 * @phlnSignature (a -> b) -> [a] -> [b]
 * @phlnCategory collection
 * @param string|callable $fn
 * @param string|array $list
 * @return \Closure|array
 */
function map($fn = nil, $list = nil)
{
    return curryN(2, '\\array_map', $fn, $list);
}
