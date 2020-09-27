<?php

declare(strict_types=1);

namespace Baethon\Phln;

const pick = 'Baethon\\Phln\\pick';

/**
 * @param object|array<string, mixed> $object
 * @param array<string>               $useKeys
 *
 * @return array<string, mixed>
 */
function pick($object, array $useKeys): array
{
    return pipe_first($object, [
        hashmap,
        _('\array_intersect_key', array_combine($useKeys, $useKeys) ?: []),
    ]);
}
