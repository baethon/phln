<?php
declare(strict_types=1);

namespace phln\object;

use function phln\collection\all;
use function phln\fn\curryN;

const where = '\\phln\\object\\where';
const 𝑓where = '\\phln\\object\\𝑓where';

/**
 * Takes a spec object and a test object; returns `true` if the test satisfies the spec. Each of the spec's properties must be a predicate function. Each predicate is applied to the value of the corresponding property of the test object. where returns `true` if all the predicates return true, false otherwise.
 *
 * `where` is well suited to declaratively expressing constraints for other functions such as `filter` and `find`.
 *
 * @phlnSignature {String: (* -> Boolean)} -> {String: *} -> Boolean
 * @phlnCategory object
 * @param array $predicates
 * @param array|object $object
 * @return \Closure|bool
 * @example
 *      $verifyJon = \phln\object\where([
 *          'firstName' => \phln\relation\equals('Jon'),
 *          'lastName' => \phln\relation\equals('Snow'),
 *      ]);
 *
 *      $verifyJon(['firstName' => 'Jon', 'lastName' => 'Snow', 'house' => 'Stark']); // true
 */
function where(array $predicates = [], $object = [])
{
    return curryN(2, 𝑓where, func_get_args());
}

function 𝑓where(array $predicates, $object): bool
{
    assertObject($object);

    $keys = keys($predicates);

    return all(
        function ($key) use ($keys, $object, $predicates) {
            $value = prop($key, $object);
            return $predicates[$key]($value);
        },
        $keys
    );
}
