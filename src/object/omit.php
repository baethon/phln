<?php
declare(strict_types=1);

namespace phln\object;

use function phln\fn\curryN;

const omit = '\\phln\\object\\omit';
const 𝑓omit = '\\phln\\object\\𝑓omit';

/**
 * Returns a partial copy of an object omitting the keys specified.
 *
 * @phlnSignature [String] -> {String: *} -> {String: *}
 * @phlnCategory object
 * @param array $omitKeys
 * @param array $object
 * @return \Closure|mixed
 * @example
 *      \phln\object\omit(['a', 'c'], ['a' => 1, 'b' => 2, 'c' => 3]); // ['b' => 2]
 */
function omit(array $omitKeys = [], array $object = [])
{
    return curryN(2, 𝑓omit, func_get_args());
}

function 𝑓omit(array $omitKeys, array $object): array
{
    return array_diff_key($object, array_combine($omitKeys, $omitKeys));
}
