<?php

declare(strict_types=1);

namespace Baethon\Phln;

const assoc = 'Baethon\\Phln\\assoc';

/**
 * @param object|array<string, mixed> $object
 * @param mixed                       $value
 * @return array<string, mixed>
 */
function assoc($object, string $key, $value): array
{
    $hashmap = hashmap($object);
    $hashmap[$key] = $value;

    return $hashmap;
}
