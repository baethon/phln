<?php
declare(strict_types=1);

namespace phln\relation;

use const phln\fn\nil;
use function phln\fn\curryN;
use function phln\fn\pipe;
use function phln\object\prop;
use function phln\object\assertObject;

const propEq = '\\phln\\relation\\propEq';
const 𝑓propEq = '\\phln\\relation\\𝑓propEq';

/**
 * Returns `true` if the specified object property is equal, in `equals()` terms, to the given value; `false` otherwise.
 *
 * @phlnSignature k -> a -> {k: a} -> Boolean
 * @phlnCategory relation
 * @param string $prop
 * @param mixed $value
 * @param mixed $object
 * @return \Closure|mixed
 * @example
 *      \phln\relation\propEq('name', 'Jon', ['name' => 'Jon']); // true
 */
function propEq(string $prop = '', $value = null, $object = null)
{
    return curryN(3, 𝑓propEq, func_get_args());
}

function 𝑓propEq(string $prop, $value, $object): bool
{
    assertObject($object);

    $f = pipe([
        prop($prop),
        equals($value),
    ]);

    return $f($object);
}
