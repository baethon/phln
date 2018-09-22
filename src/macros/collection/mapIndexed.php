<?php
declare(strict_types=1);

namespace phln\collection;

use function phln\fn\curryN;

const mapIndexed = '\\phln\\collection\\mapIndexed';
const 𝑓mapIndexed = '\\phln\\collection\\𝑓mapIndexed';

/**
 * Applies the callback to the elements of the given arrays
 *
 * Callback will receive index of iterated value as a second argument.
 *
 * @phlnSignature ((a, i) -> b) -> [a] -> [b]
 * @phlnCategory collection
 * @param callable $fn
 * @param array $list
 * @return \Closure|array
 */
function mapIndexed(callable $fn = null, array $list = [])
{
    return curryN(2, 𝑓mapIndexed, func_get_args());
}

function 𝑓mapIndexed(callable $fn, array $list): array
{
    $keys = array_keys($list);
    $mapped = array_map($fn, $list, $keys);
    return array_combine($keys, $mapped);
}
