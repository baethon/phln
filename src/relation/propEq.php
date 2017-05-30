<?php
declare(strict_types=1);

namespace phln\relation;

use function phln\fn\curry;
use const phln\fn\nil;
use function phln\fn\pipe;
use function phln\object\prop;

const propEq = '\\phln\\relation\\propEq';
const 𝑓propEq = '\\phln\\relation\\𝑓propEq';

/**
 * Returns `true` if the specified object property is equal, in `equals()` terms, to the given value; `false` otherwise.
 *
 * @phlnSignature k -> a -> {k: a} -> Boolean
 * @phlnCategory relation
 * @param string $prop
 * @param string $value
 * @param string $object
 * @return \Closure|mixed
 * @example
 *      \phln\relation\propEq('name', 'Jon', ['name' => 'Jon']); // true
 */
function propEq($prop = nil, $value = nil, $object = nil)
{
    return curry(𝑓propEq, $prop, $value, $object);
}

function 𝑓propEq($prop, $value, array $object): bool
{
    $f = pipe(
        prop($prop),
        equals($value)
    );

    return $f($object);
}
