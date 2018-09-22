<?php
declare(strict_types=1);

namespace phln\object;

use const phln\fn\__;
use function phln\collection\append;
use function phln\collection\reduce;
use function phln\fn\curryN;
use function phln\fn\partial;

const props = '\\phln\\object\\props';
const 𝑓props = '\\phln\\object\\𝑓props';

/**
 * Acts as multiple `prop`: array of keys in, array of values out. Preserves order.
 *
 * @phlnSignature [k] -> {k: v} -> [v]
 * @phlnCategory object
 * @param array $props
 * @param array|object $object
 * @return \Closure|array
 * @example
 *      $fullName = \phln\fn\compose(\phln\string\join(' '), \phln\object\props(['firstName', 'lastName']));
 *      $fullName(['lastName' => 'Snow', 'firstName' => 'Jon']); // 'Jon Snow'
 */
function props(array $props = [], $object = [])
{
    return curryN(2, 𝑓props, func_get_args());
}

function 𝑓props(array $props, $object): array
{
    assertObject($object);

    $getProp = partial(prop, [__, $object]);
    return reduce(
        function ($carry, $prop) use ($getProp) {
            return append($getProp($prop), $carry);
        },
        [],
        $props
    );
}
