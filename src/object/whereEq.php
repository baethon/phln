<?php
declare(strict_types=1);

namespace phln\object;

use const phln\fn\nil;
use const phln\relation\equals;
use function phln\collection\map;
use function phln\fn\curryN;

const whereEq = '\\phln\\object\\whereEq';
const 𝑓whereEq = '\\phln\\object\\𝑓whereEq';

/**
 * Takes a spec object and a test object; returns `true` if the test satisfies the spec, false otherwise. An object satisfies the spec if, for each of the spec's properties, accessing that property of the object gives the same value (in `\phln\relation\equals()` terms) as accessing that property of the spec.
 *
 * @phlnSignature {String: *} -> {String: *} -> Boolean
 * @phlnCategory object
 * @param string $predicates
 * @param string $object
 * @return \Closure|bool
 * @example
 *      $verifyJon = \phln\object\whereEq(['firstName' => 'Jon', 'lastName' => 'Snow']);
 *      $verifyJon(['firstName' => 'Jon', 'lastName' => 'Snow']); // true
 */
function whereEq($predicates = nil, $object = nil)
{
    return curryN(2, 𝑓whereEq, [$predicates, $object]);
}

function 𝑓whereEq(array $predicates, array $object): bool
{
    return where(
        map(equals, $predicates),
        $object
    );
}
