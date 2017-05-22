<?php
declare(strict_types=1);

namespace phln\object;

use const phln\fn\nil;
use function phln\fn\curry;

const omit = '\\phln\\object\\𝑓omit';

/**
 * Returns a partial copy of an object omitting the keys specified.
 *
 * @phlnSignature [String] -> {String: *} -> {String: *}
 * @phlnCategory object
 * @param string $omitKeys
 * @param string $object
 * @return \Closure|mixed
 * @example
 *      \phln\object\omit(['a', 'c'], ['a' => 1, 'b' => 2, 'c' => 3]); // ['b' => 2]
 */
function omit($omitKeys = nil, $object = nil)
{
    return curry(omit, $omitKeys, $object);
}

function 𝑓omit(array $omitKeys, array $object): array
{
    return array_diff_key($object, array_combine($omitKeys, $omitKeys));
}
