<?php

declare(strict_types=1);

namespace Baethon\Phln;

const to_pairs = 'Baethon\\Phln\\to_pairs';

/**
 * @param object|array<string, mixed> $object
 *
 * @return array<array{mixed, mixed}>
 */
function to_pairs($object): array
{
    $hashmap = hashmap($object);
    return zip(keys($hashmap), values($hashmap));
}
