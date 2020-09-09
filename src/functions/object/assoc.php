<?php

declare(strict_types=1);

namespace Baethon\Phln;

const assoc = 'Baethon\\Phln\\assoc';

/**
 * @template T of object|array<string, mixed>
 * @param T $object
 * @param string $key
 * @param mixed $value
 * @return T
 * @psalm-immutable
 * @psalm-return (
 *      T is object
 *      ? object
 *      : array<string, mixed>
 * )
 */
function assoc ($object, string $key, $value) {
    assert_object($object);

    if (is_object($object)) {
        /** @var object $object */
        $copy = clone $object;
        $copy->{$key} = $value;

        return $copy;
    }

    $object[$key] = $value;

    return $object;
}
