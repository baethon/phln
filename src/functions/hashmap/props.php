<?php

declare(strict_types=1);

namespace Baethon\Phln;

const props = 'Baethon\\Phln\\props';

/**
 * @param object|array<string, mixed> $object
 * @param array<string>               $properties
 *
 * @return array<mixed>
 */
function props($object, array $properties): array
{
    $hashmap = hashmap($object);

    return map(
        $properties,
        partial(prop, [$hashmap])
    );
}
