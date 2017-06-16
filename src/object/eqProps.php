<?php
declare(strict_types=1);

namespace phln\object;

use const phln\fn\nil;
use const phln\relation\equals;
use function phln\collection\map;
use function phln\fn\{
    apply, curryN, pipe
};

const eqProps = '\\phln\\object\\eqProps';
const 𝑓eqProps = '\\phln\\object\\𝑓eqProps';

/**
 * Reports whether two objects have the same value, in `\phln\relation\equals` terms, for the specified property.
 *
 * @phlnSignature k -> {k: v} -> {k: v} -> Boolean
 * @phlnCategory object
 * @param string $prop
 * @param string $a
 * @param string $b
 * @return \Closure|mixed
 * @example
 *      \phln\object\eqProps('name', ['name' => 'Jon'], ['name' => 'Jon']); // true
 */
function eqProps($prop = nil, $a = nil, $b = nil)
{
    return curryN(3, 𝑓eqProps, [$prop, $a, $b]);
}

function 𝑓eqProps(string $prop, array $a, array $b): bool
{
    $f = pipe([
        map(prop($prop)),
        apply(equals),
    ]);

    return $f([$a, $b]);
}
