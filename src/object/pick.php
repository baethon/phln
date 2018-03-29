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
 * @param string|array $useKeys
 * @param string|array $object
 * @return \Closure|array
 * @example
 *      \phln\object\pick(['a'], ['a' => 1, 'b' => 2]); // ['a' => 1]
 */
function pick($useKeys = null, $object = null)
{
    return curryN(2, 𝑓pick, [$useKeys, $object]);
}

function 𝑓pick(array $useKeys, array $object): array
{
    return array_intersect_key($object, array_combine($useKeys, $useKeys));
}
