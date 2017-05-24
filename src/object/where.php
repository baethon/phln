<?php
declare(strict_types=1);

namespace phln\object;

use function phln\collection\all;
use function phln\fn\curry;
use const phln\fn\nil;

const where = '\\phln\\object\\where';
const 𝑓where = '\\phln\\object\\𝑓where';

/**
 * Takes a spec object and a test object; returns `true` if the test satisfies the spec. Each of the spec's properties must be a predicate function. Each predicate is applied to the value of the corresponding property of the test object. where returns `true` if all the predicates return true, false otherwise.
 *
 * `where` is well suited to declaratively expressing constraints for other functions such as `filter` and `find`.
 *
 * @phlnSignature {String: (* -> Boolean)} -> {String: *} -> Boolean
 * @phlnCategory object
 * @param string|array $predicates
 * @param string|array $object
 * @return \Closure|bool
 * @example
 *      $verifyJon = \phln\object\where([
 *          'firstName' => \phln\relation\equals('Jon'),
 *          'lastName' => \phln\relation\equals('Snow'),
 *      ]);
 *
 *      $verifyJon(['firstName' => 'Jon', 'lastName' => 'Snow', 'house' => 'Stark']); // true
 */
function where($predicates = nil, $object = nil)
{
    return curry(𝑓where, $predicates, $object);
}

function 𝑓where(array $predicates, array $object): bool
{
    $keys = keys($predicates);

    return all(
        function ($key) use ($keys, $object, $predicates) {
            return $predicates[$key]($object[$key]);
        },
        $keys
    );
}
