<?php

declare(strict_types=1);

namespace Baethon\Phln;

const has = 'Baethon\\Phln\\has';

/**
 * @param array<string, mixed>|object $object
 */
function has($object, string $prop): bool
{
    return array_key_exists($prop, hashmap($object));
}
