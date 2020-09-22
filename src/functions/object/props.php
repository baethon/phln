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
    $object = ObjectWrapper::of($object);

    return map(
        $properties,
        function (string $name) use ($object) {
            return $object->prop($name);
        }
    );
}
