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
 * @param array|object $object
 * @return \Closure|array
 * @example
 *      \phln\object\omit(['a', 'c'], ['a' => 1, 'b' => 2, 'c' => 3]); // ['b' => 2]
 */
function omit(array $omitKeys = [], $object = [])
{
    return curryN(2, 𝑓omit, func_get_args());
}

function 𝑓omit(array $omitKeys, $object): array
{
    assertObject($object);

    return array_diff_key((array) $object, array_combine($omitKeys, $omitKeys));
}
