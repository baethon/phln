<?php

declare(strict_types=1);

namespace Baethon\Phln;

const keys = 'Baethon\\Phln\\keys';

/**
 * @param object|array<string, mixed> $object
 *
 * @return array<string>
 */
function keys($object): array
{
    assert_object($object);

    $value = is_object($object)
        ? get_object_vars($object)
        : $object;

    return array_keys($value);
}
