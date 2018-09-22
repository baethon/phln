<?php
declare(strict_types=1);

namespace phln\object;

use function phln\fn\curryN;

const pick = '\\phln\\object\\pick';
const 𝑓pick = '\\phln\\object\\𝑓pick';

/**
 * Returns a partial copy of an object containing only the keys specified. If the key does not exist, the property is ignored.
 *
 * @phlnSignature [String] -> {String: *} -> {String: *}
 * @phlnCategory object
 * @param array $useKeys
 * @param array|object $object
 * @return \Closure|array
 * @example
 *      \phln\object\pick(['a'], ['a' => 1, 'b' => 2]); // ['a' => 1]
 */
function pick(array $useKeys = [], $object = [])
{
    return curryN(2, 𝑓pick, func_get_args());
}

function 𝑓pick(array $useKeys, $object): array
{
    assertObject($object);
    return array_intersect_key((array) $object, array_combine($useKeys, $useKeys));
}
