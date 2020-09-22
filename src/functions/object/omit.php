<?php

declare(strict_types=1);

namespace Baethon\Phln;

const omit = 'Baethon\\Phln\\omit';

/**
 * @param object|array<string, mixed> $object
 * @param array<string>               $omitKeys
 *
 * @return array<string, mixed>
 */
function omit($object, array $omitKeys): array
{
    assert_object($object);

    return array_diff_key((array) $object, array_combine($omitKeys, $omitKeys) ?: []);
}
