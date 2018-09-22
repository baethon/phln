<?php
declare(strict_types=1);

namespace phln\object;

use function phln\fn\curryN;

const pathOr = '\\phln\\object\\pathOr';
const 𝑓pathOr = '\\phln\\object\\𝑓pathOr';

/**
 * Returns nested value using "dot notation". If key is not defined, or value is NULL default value will be returned.
 *
 * @phlnSignature String -> a -> {k: v} -> v | a
 * @phlnCategory object
 * @param string $path
 * @param mixed $default
 * @param array $object
 * @return \Closure|mixed
 * @example
 *      \phln\object\pathOr('a.b', 'foo', ['a' => ['b' => 1]]); // 1
 *      \phln\object\pathOr('a.b', 'foo', ['a' => ['b' => 0]]); // 0
 *      \phln\object\pathOr('a.b', 'foo', ['a' => ['b' => null]]); // 'foo'
 *      \phln\object\pathOr('a.b', 'foo', ['a' => 1]); // 'foo'
 */
function pathOr(string $path = '', $default = null, array $object = [])
{
    return curryN(3, 𝑓pathOr, func_get_args());
}

function 𝑓pathOr(string $path, $default, array $object)
{
    return path($path, $object) ?? $default;
}
