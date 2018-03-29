<?php
declare(strict_types=1);

namespace phln\collection;

use function phln\fn\curryN;

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
function map($fn = null, $list = null)
{
    return curryN(2, '\\array_map', [$fn, $list]);
}
