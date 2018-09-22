<?php
declare(strict_types=1);

namespace phln\object;

const toPairs = '\\phln\\object\\toPairs';

/**
 * Converts an object into an array of key-value arrays.
 *
 * Note that order of output is not guaranteed.
 *
 * @phlnSignature String k => { k: v } -> [[k, v]]
 * @phlnCategory object
 * @param array|object $object
 * @return array
 * @example
 *      \phln\object\toPairs(['foo' => 1, 'bar' => 2]); // [['foo', 1], ['bar', 2]]
 */
function toPairs($object): array
{
    assertObject($object);

    $pairs = [];

    foreach ($object as $key => $value) {
        $pairs[] = [$key, $value];
    }

    return $pairs;
}
