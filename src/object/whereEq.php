<?php
declare(strict_types=1);

namespace phln\object;

use const phln\fn\nil;
use function phln\collection\map;
use function phln\fn\curry;
use function phln\relation\equals;

const whereEq = '\\phln\\object\\𝑓whereEq';

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
    return curry(whereEq, $predicates, $object);
}

function 𝑓whereEq(array $predicates, array $object): bool
{
    // @TODO maybe map() should be split to mapIndexed(value, key, object) and map(value)?

    return where(
        map(function ($value) {
            return equals($value);
        }, $predicates),
        $object
    );
}
