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
    return pipe_first($object, [
        hashmap,
        _('\array_diff_key', array_combine($omitKeys, $omitKeys) ?: []),
    ]);
}
