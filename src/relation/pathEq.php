<?php
declare(strict_types=1);

namespace phln\relation;

use const phln\fn\nil;
use function phln\fn\curryN;
use function phln\fn\pipe;
use function phln\object\path;

const pathEq = '\\phln\\relation\\pathEq';
const 𝑓pathEq = '\\phln\\relation\\𝑓pathEq';

/**
 * Determines whether a nested path on an object has a specific value, in `equals()` terms.
 *
 * @phlnSignature String -> a -> {a} -> Boolean
 * @phlnCategory relation
 * @param string $path
 * @param mixed $value
 * @param string|array $object
 * @return \Closure|bool
 * @example
 *      \phln\relation\pathEq('foo.bar', 1, ['foo' => ['bar' => 1]]); // true
 */
function pathEq($path = nil, $value = nil, $object = nil)
{
    return curryN(3, 𝑓pathEq, [$path, $value, $object]);
}

function 𝑓pathEq(string $path, $value, array $object): bool
{
    $f = pipe(
        path($path),
        equals($value)
    );

    return $f($object);
}
